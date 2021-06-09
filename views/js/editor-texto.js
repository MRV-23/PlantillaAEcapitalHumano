var myCustomTemplates = {
  custom1: function(context) {
    return "<li>" +
      "<a class='fa fa-ticket' data-wysihtml5-command='insertHTML' data-wysihtml5-command-value='&hellip;'>hellip</a>" +
      "</li>";
  }
};

$('#editortexto1').wysihtml5({
    toolbar: {
      "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
      "emphasis": true, //Italics, bold, etc. Default true
      "textAlign": true,
      "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
      "html": false, //Button which allows you to edit the generated HTML. Default false
      "link": false, //Button to insert a link. Default true
      "image": false, //Button to insert an image. Default true,
      "color": false, //Button to change color of font  
      "blockquote": false
    },
  customTemplates: myCustomTemplates
});