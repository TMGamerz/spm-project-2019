<link rel = "stylesheet" type = "text/css" href = "css/footer-style.css">
<div class = "footer">
    <div id = "zoomingButton">
        <button onclick="resizeText(-1)">Smaller</button>
        <button onclick="resizeText(1)">Bigger</button>
    </div>
    <p id = "copyright">Copyright &copy; 2019 Ch'ng Sin Yi</p>
</div>

<script type="text/javascript">
    function resizeText(multiplier){
        if(document.body.style.fontSize === ""){
            document.body.style.fontSize = "1.0em";
        }
        document.body.style.fontSize = parseFloat
        (document.body.style.fontSize) + (multiplier * 0.2) + "em";
    }
</script>
</body>
</html>