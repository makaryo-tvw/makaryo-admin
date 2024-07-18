<!-- Javascripts -->
<script src="/admin/assets/plugins/jquery/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="/admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="/admin/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
<script src="/admin/assets/js/main.min.js"></script>
<script src="/admin/assets/js/pages/dashboard.js"></script>

<!-- Notyf -->
<script src="/admin/assets/plugins/notyf/notyf.min.js"></script>

<!-- Check URL Loading -->
<script>
    var loading_page = document.getElementById('loading-page')
    function checkUrlLoading(url) {
        var xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 3 || xhr.readyState == 2 ) {
                loading_page.classList.remove('d-none')
            }
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    loading_page.classList.add('d-none')
                } else {
                    loading_page.classList.add('d-none')
                    // Do something when the URL failed to load
                }
            }
        };

        xhr.open("GET", url, true);
        xhr.send();
    }

    // Example usage
    checkUrlLoading('{{ request()->url() }}');
</script>
<!-- Check URL Loading -->

<script>

let sessionSuccess = @json(session('success'));
let sessionError   = @json(session('error'));

if (sessionSuccess != null){
const notyf = new Notyf({
    position: {
        x: 'right',
        y: 'top',
    },
    types: [
        {
            type: 'success',
            background: '#24b552',
            icon: {
                className: 'fa fa-check',
                tagName: 'span',
                color: '#fff'
            },
            dismissible: false
        }
    ]
});
notyf.open({
    type: 'success',
    message: sessionSuccess
});
}
if (sessionError != null){
const notyf = new Notyf({
    position: {
        x: 'right',
        y: 'top',
    },
    types: [
        {
            type: 'success',
            background: '#FA5252',
            icon: {
                className: 'fa fa-times',
                tagName: 'span',
                color: '#fff'
            },
            dismissible: false
        }
    ]
});
notyf.open({
    type: 'error',
    message: sessionError
});
}

</script>

{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Show loading animation
        showLoading();

        // Simulate a delay (you can replace this with your actual loading logic)
        setTimeout(function() {
            // Hide loading animation after the delay
            hideLoading();
        }, 3000); // Change 3000 to the desired delay in milliseconds
    });

    function showLoading() {
        document.getElementById("loading-container").style.display = "flex";
    }

    function hideLoading() {
        document.getElementById("loading-container").style.display = "none";
    }
</script> --}}