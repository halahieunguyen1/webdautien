
	var widthImage=document.getElementsByClassName('item-chuyen')[0].clientWidth;
    var margin=0;
    var slidechuyen=document.getElementsByClassName('slide-chuyen')[0],
        max=(document.getElementsByClassName('item-chuyen').length-5)*(widthImage);
        x=1;
function chuyenSlide(){
  
    if ((margin>max)&&(x==1))
    {
        x=-1
    }
    if ((margin<0)&&(x==-1)){
        x=1
     
    }

    margin+=widthImage*x
    
    slidechuyen.style.left='-'+margin+'px';
}
setInterval(
    function(){
        chuyenSlide()
    },5000
)
