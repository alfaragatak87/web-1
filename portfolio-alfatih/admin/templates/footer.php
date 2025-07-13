</div>
    </div>
    
    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar toggle
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const adminContainer = document.querySelector('.admin-container');
            
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    adminContainer.classList.toggle('sidebar-collapsed');
                });
            }
            
            // Mobile sidebar toggle
            const mediaQuery = window.matchMedia('(max-width: 992px)');
            
            function handleScreenChange(e) {
                if (e.matches) {
                    adminContainer.classList.add('sidebar-collapsed');
                } else {
                    adminContainer.classList.remove('sidebar-collapsed');
                }
            }
            
            // Initial check
            handleScreenChange(mediaQuery);
            
            // Add listener for screen size changes
            mediaQuery.addEventListener('change', handleScreenChange);
            
            // File input preview
            const fileInputs = document.querySelectorAll('.custom-file-input');
            
            fileInputs.forEach(input => {
                input.addEventListener('change', function() {
                    const fileName = this.files[0]?.name || 'Choose file';
                    const fileLabel = this.nextElementSibling;
                    
                    if (fileLabel) {
                        fileLabel.textContent = fileName;
                    }
                    
                    // Image preview if it's an image
                    const previewContainer = this.closest('.form-group').querySelector('.image-preview');
                    if (previewContainer && this.files[0]) {
                        const reader = new FileReader();
                        
                        reader.onload = function(e) {
                            previewContainer.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                        }
                        
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            });
        });
    </script>
</body>
</html>