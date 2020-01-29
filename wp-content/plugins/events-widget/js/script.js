jQuery( document ).ready(function() {
    var flag = false;
    var user = jQuery('#join-member').attr('user-id');
    var post_id = jQuery('#join-member').attr('post-id');

    Array.from(document.getElementsByClassName('member')).forEach(function (element) {
      console.log(element.id);
        if (element.id === user) {
            flag = true;
        }

    });

    if(flag === true){
        jQuery('#delete-member').show();
        jQuery('#join-member').hide();
    }else {
        jQuery('#delete-member').hide();
        jQuery('#join-member').show();
    }

    jQuery('#join-member').click(function (e) {
        e.preventDefault();
        if (flag === false) {
            jQuery.ajax({
                type: "POST",
                url: '/wp-admin/admin-ajax.php',
                data: {
                    action: 'join_member',
                    post_id: post_id
                },
                success: function (data) {
                    jQuery('.member-ajax-container a').remove();
                    jQuery('.member-ajax-container').append(data);
                    jQuery('#join-member').hide();
                    jQuery('#delete-member').show()
                }
            });
        }
    });

    jQuery('#delete-member').click( function (e) {
        e.preventDefault();
        flag = false;
        jQuery.ajax({
            type: "POST",
            url: '/wp-admin/admin-ajax.php',
            data: {
                action: 'delete_member',
                post_id: post_id,
                user: user
            },
            success: function (data) {
                jQuery('.member-ajax-container a').remove();
                jQuery('.member-ajax-container').append(data);
                jQuery('#join-member').show();
                jQuery('#delete-member').hide()
            }
        });
    });

});