jQuery(document).ready(function(){

    //show article
    $('a.showArticle').click(function() {

        var anchorID = this.id;
        var targetID = anchorID.split("_")[1];
        var target = $("#" + targetID);

        if (target.length) {
            //make visible
            jQuery('article').hide();
            target.show();

            //tag active list item
            jQuery("a.showArticle").parent().removeClass('active');
            jQuery(this).parent().addClass('active');
        }

    });

});

