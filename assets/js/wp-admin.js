jQuery(document).ready(function(e){e("i.fa-social").on("click",function(){var a=e(this),c=e("input#"+a.attr("data-id"));e(this).toggleClass("fa-active"),c.prop("checked",!c.prop("checked")),c.prop("checked")?e("."+c.prop("id")).addClass("active"):e("."+c.prop("id")).removeClass("active")})});
//# sourceMappingURL=wp-admin.js.map