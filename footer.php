<!-- Footer yang mempunyai button untuk membesarkan atau mengecilkan text dan menukar ke bahasa lain -->
<div class = "footer">
    <!-- Google Language Translation untuk menukar ke bahasa lain -->
    <div id = "google_translate_element"></div>
    <!-- Button untuk membesarkan atau mengecilkan text -->
    <div id = "zoomingButton">
        <button class = "btn1" onclick="resizeText(-1)">Smaller</button>
        <button class = "btn2" onclick="resizeText(1)">Bigger</button>
    </div>
    <p id = "copyright">Copyright &copy; 2019 Ch'ng Sin Yi</p>
</div>

<script type="text/javascript">
    // Function untuk membesarkan atau mengecilkan text
    function resizeText(multiplier) {
        if (document.body.style.fontSize === "") {
            document.body.style.fontSize = "1.0em";
        }
        document.body.style.fontSize = parseFloat
        (document.body.style.fontSize) + (multiplier * 0.2) + "em";
    }
</script>

<script type="text/javascript">
    // Function untuk Google Language Translation
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: "ms"}, "google_translate_element");
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>