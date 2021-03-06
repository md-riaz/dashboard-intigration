<footer class="footer">
    <div class="container-fluid">
        <nav class="float-left">
            <ul>
                <li>
                    <a href="">
                        md riaz
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright float-right">
            &copy;
            <script>
                document.write(new Date().getFullYear());
            </script>
            , made with <i class="material-icons">favorite</i> by
            <a href="#" target="_blank">Example dashboard</a>
            for a better web.
        </div>
        <!-- your footer here -->
    </div>
</footer>
</div>
</div>
<script>
    function imgup() {
        document.querySelector("#ProfileImage").click();
    }

    function displayImg(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector("#ProfileDisplay").setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
    // if img src is empty then show placeholder img 
    var img = document.querySelectorAll("img");

    img.forEach(e => {
        var imgsrc = e.getAttribute('src');
        if (imgsrc == "") {
            e.setAttribute("src", "https://i.postimg.cc/Jn6LHkYM/img-placeholder.png");
            e.style.objectFit = "cover";
        }
    });




    function change_eye(data) {
        if (data == "one") {
            var pass = document.querySelector("#password");
            var eye = document.querySelector(".fa-eye.one");
            var eyeSlash = document.querySelector(".fa-eye-slash.one");
        } else {
            var pass = document.querySelector("#re-password");
            var eye = document.querySelector(".fa-eye.two");
            var eyeSlash = document.querySelector(".fa-eye-slash.two");
        }


        if (pass.type === "password") {
            pass.type = "text";
            eye.style.display = "block";
            eyeSlash.style.display = "none";

        } else {
            pass.type = "password";
            eye.style.display = "none";
            eyeSlash.style.display = "block";
        }

    }
</script>
<!--   Core JS Files   -->

<script src="/admin/dashboard_assets/js/core/popper.min.js"></script>
<script src="/admin/dashboard_assets/js/core/bootstrap-material-design.min.js"></script>
<script src="/admin/dashboard_assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/admin/dashboard_assets/js/plugins/bootstrap-notify.js"></script>



<!-- Plugin for the momentJs  -->
<script src="/admin/dashboard_assets/js/plugins/moment.min.js"></script>
<!--  Plugin for Sweet Alert -->
<script src="/admin/dashboard_assets/js/plugins/sweetalert2.js"></script>
<!-- Forms Validations Plugin -->
<script src="/admin/dashboard_assets/js/plugins/jquery.validate.min.js"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="/admin/dashboard_assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="/admin/dashboard_assets/js/plugins/bootstrap-selectpicker.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="/admin/dashboard_assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src="/admin/dashboard_assets/js/plugins/jquery.dataTables.min.js"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="/admin/dashboard_assets/js/plugins/bootstrap-tagsinput.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="/admin/dashboard_assets/js/plugins/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="/admin/dashboard_assets/js/plugins/fullcalendar.min.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="/admin/dashboard_assets/js/plugins/jquery-jvectormap.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="/admin/dashboard_assets/js/plugins/nouislider.min.js"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="/admin/dashboard_assets/js/plugins/arrive.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist JS -->
<script src="/admin/dashboard_assets/js/plugins/chartist.min.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/admin/dashboard_assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->



<script>
    $(document).ready(function() {
        let nav_items = $(".nav-item");

        nav_items.click((e) => {
            nav_items.each(() => {
                nav_items.removeClass("active");

            })
            e.currentTarget.classList.add("active");
        })

    });
    //binds to onchange event of your input field
    $('#ProfileImage').bind('change', function() {

        //this.files[0].size gets the size of your file.
        function formatBytes(bytes, decimals = 2) {
            if (bytes === 0) return '0 Bytes';

            const k = 1024;
            const dm = decimals < 0 ? 0 : decimals;
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

            const i = Math.floor(Math.log(bytes) / Math.log(k));

            return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
        }
        $(".size").replaceWith(formatBytes(this.files[0].size))

    });
</script>












</body>

</html>