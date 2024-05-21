$(document).ready(() => {

    // Confirm dialog on delete
    $('.delete-item-form').on('click', function () {
        var confirmDeleteDialog = confirm("Наистина ли желаете да изтриете този запис?");
        if (confirmDeleteDialog) {
            return true;
        } else {
            return false;
        }
    });

});
