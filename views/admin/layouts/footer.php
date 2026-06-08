            </main>
        </div><!-- /admin-main -->
    </div><!-- /admin-layout -->

    <script>
    // Sidebar Toggle (Mobile)
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('open');
    }
    document.addEventListener('click', function(e) {
        var sidebar = document.getElementById('sidebar');
        var toggle  = document.getElementById('sidebarToggle');
        if (sidebar && toggle && window.innerWidth < 992) {
            if (!sidebar.contains(e.target) && !toggle.contains(e.target)) {
                sidebar.classList.remove('open');
            }
        }
    });

    // Loading state on all form submits
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('form').forEach(function(form) {
            form.addEventListener('submit', function () {
                form.querySelectorAll('button[type="submit"]').forEach(function(btn) {
                    btn.innerHTML = '<i class="ri-loader-4-line ri-spin"></i> Memproses...';
                    btn.disabled = true;
                    btn.style.opacity = '0.75';
                });
            });
        });
    });
    </script>
</body>
</html>
