<script type="text/javascript">
    var annotation = document.getElementById("annotation");
    var napsano = document.getElementById("napsano");
    var zbyva = document.getElementById("zbyva");    
    var maximum = 200;
    var vyskocit = true;
    var hlaska = "Maximální počet znaků je omezen na " + maximum + ".";    
    function pocitani()
  {
      pocet = annotation.value.length;
      if(pocet > maximum)
    {
        annotation.value = annotation.value.substring(0, maximum );        
        if(vyskocit)
    {
        alert(hlaska);
    }
    }
      else
    {
        napsano.value = pocet;
        zbyva.value = maximum - pocet;
    }
  }
</script>