// function auto_grow(element) {
//     element.style.height = "5px";
//     element.style.height = (element.scrollHeight)+"px";
// }
function edit() {
  let getSiblings = function (e) {
    // for collecting siblings
    let siblings = [];
    // if no parent, return no sibling
    if (!e.parentNode) {
      return siblings;
    }
    // first child of the parent node
    let sibling = e.parentNode.firstChild;
    // collecting siblings
    while (sibling) {
      if (sibling.nodeType === 1 && sibling !== e) {
        siblings.push(sibling);
      }
      sibling = sibling.nextSibling;
    }
    return siblings;
  };

  let siblings = getSiblings(document.querySelector(".xoa"));
  //   siblingText = siblings.map((e) => e.innerHTML);
  //   console.log(siblingText);
  //   siblingText = siblings.map((e) => e.innerHTML);

  for (var i = 1; i < siblings.length - 1; i++) {
    //   siblingText = siblings.map((e) => e.innerHTML);
    //   console.log(siblingText);
    // siblings[i].disabled = siblings[i].disabled = false;
    siblings[i].disabled = false;
    console.log(siblings[i]);
  }
}
$(".xoa").click(function(){ 
    $("td.xoa").siblings('.input').children().prop('disabled', (i, v) => !v);
    $("td.xoa").siblings('.input').children().addClass("active-inpt");
  });
  