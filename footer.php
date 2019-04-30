<!--Footer with resize text and translation-->

<div class = "footer">
    <!--Showing translation -->
    <div id = "google_translate_element"></div>
    <!--Showing resize text button-->
    <div id = "zoomingButton">
        <button class = "btn1" onclick="resizeText(-1)">Smaller</button>
        <button class = "btn2" onclick="resizeText(1)">Bigger</button>
    </div>
    <p id = "copyright">Copyright &copy; 2019 Ch'ng Sin Yi</p>
</div>

<script type="text/javascript">
    // resize text function
    function resizeText(multiplier){
        if(document.body.style.fontSize === ""){
            document.body.style.fontSize = "1.0em";
        }
        document.body.style.fontSize = parseFloat
        (document.body.style.fontSize) + (multiplier * 0.2) + "em";
    }
</script>

<!--Google Language Translation-->
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'ms'}, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>