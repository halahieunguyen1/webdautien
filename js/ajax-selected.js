$(document).ready(function(){
    $("#species-product-selected").change(function(){
        
    var species=$("#species-product-selected").val();
    $.post("selected.php",{species:species},function(data){
        $("#firm-product-selected").html(data);
    })
    })
})
$(document).ready(function(){
    $("#firm-selected").change(function(){
        
    var species1=$("#firm-selected").val();
    $.post("selected.php",{species1:species1},function(data){
        x=data.split('???')
        $("#firm-table").html(x[0]);
        $(".phantrang").html(x[1])
    })
    })
})
$(document).ready(function(){
    $("#species-product-selected-table").change(function(){
        
    var species2=$("#species-product-selected-table").val();
    $.post("selected.php",{species2:species2},function(data){
        x=data.split('???')
        $("#product-table").html(x[0]);
        $(".phantrang").html(x[1])
    })
    })
})
$(document).ready(function(){
    $(".user-sort").change(function(){
        
    var value1=$(".user-sort").val(),
    value2='lowhigh',
    x=document.getElementsByName("sort_user")
    for (var i = 0; i < x.length; i++){
        if (x[i].checked === true){
            value2=x[i].value
        }
    }
 
    $.post("sort.php",{sort_user:value1,sort_type:value2},function(data){
        x=data.split('???')
        $(".table_body").html(x[0]);
        $(".phantrang").html(x[1])
    })
    
    })
    $(".sort-type").change(function(){
        var value1=$(".user-sort").val(),
        value2='lowhigh',
        x=document.getElementsByName("sort_user")
        for (var i = 0; i < x.length; i++){
            if (x[i].checked === true){
                value2=x[i].value
            }
        }
  
        $.post("sort.php",{sort_user:value1,sort_type:value2},function(data){
            x=data.split('???')
            $(".table_body").html(x[0]);
            $(".phantrang").html(x[1])
        })
        
        })
})
