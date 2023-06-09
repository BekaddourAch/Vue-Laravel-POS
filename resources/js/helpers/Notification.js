class Notification {
    success(){
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: 'Success Done',
            timeout:1000
        }).show();
    }
    alert(){
        new Noty({
            type: 'alert',
            layout: 'topRight',
            text: 'Are you sure?',
            timeout:1000
        }).show();
    }
    error(){
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: 'Something went wrong !',
            timeout:1000
        }).show();
    }
    warning(){
        new Noty({
            type: 'warning',
            layout: 'topRight',
            text: 'Opps wrong !',
            timeout:1000
        }).show();
    }
    image_validation(){
        new Noty({
            type: 'error',
            layout: 'topleft',
            theme: 'mint',
            text: 'Upload image less then 1MB',
            timeout:2000,
            container: '.errNoty'
        }).show();
    }
    cart_success(){
        new Noty({
            type: 'success',
            layout: 'topright',
            theme: 'mint',
            text: 'Successfully Add to Cart!',
            timeout:2000,
        }).show();
    }
    cart_delete(){
        new Noty({
            type: 'success',
            layout: 'topright',
            theme: 'mint',
            text: 'Successfully Deleted Cart!',
            timeout:2000,
        }).show();
    }
    }
    
export default Notification =new Notification();
