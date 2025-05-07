
<style>
    .footer {
        width: 100%;
        text-align: center;
        padding: 1px;
        position: fixed;
        bottom: -50px;
        left: 0;
        background:rgb(255, 255, 255);
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        font-size: 14px;
        transition: bottom 0.5s ease-in-out;
    }

    .footer.show {
        bottom: 0;
    }

    .content-wrapper {
        padding-bottom: 5px; 
    }

    
</style>

<footer class="footer" id="pageFooter">
    <div class="container">
        <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
    </div>
    
</footer>

<script>
    function checkFooterVisibility() {
        var footer = document.getElementById("pageFooter");
        var contentHeight = document.documentElement.scrollHeight;
        var viewportHeight = window.innerHeight;

        if (contentHeight <= viewportHeight) {
        
            footer.classList.add("show");
        } else {
        
            footer.classList.remove("show");

      
            document.addEventListener("scroll", function () {
                var scrollPosition = window.scrollY + window.innerHeight;

                if (scrollPosition >= contentHeight - 1) {
                    footer.classList.add("show");
                } else {
                    footer.classList.remove("show");
                }
            });
        }
    }

 
    window.onload = checkFooterVisibility;
</script>