var index = 1;
show(index);

function plus(n) {
  show(index += n);
}

function show(n) {
  var i;
  var img = $(".carousel_img");
  if(n > img.length) {index = 1}
  if(n < 1) {index = img.length};
  for(i = 0; i < img.length; i++) {
    $(img[i]).css("display", "none");
  }
  $(img[index-1]).css("display", "flex");
}
