//Nút quay về
$(document).ready(function() {
            $('#goBackBtn').click(function() {
                window.history.back();
            });
        });



// favorite.js

$(document).ready(function() {
    $('#favoriteBtn').on('click', function(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của nút
        
        var id_book = $('#id_book').val();
        
        // Gửi yêu cầu AJAX để thêm hoặc xóa yêu thích
        $.ajax({
            type: "POST",
            url: "toggle_favorite.php",
            data: { id_book: id_book },
            success: function(response) {
                if (response === 'not_login') {
                    // Hiển thị thông báo nếu người dùng chưa đăng nhập
                    alert("Vui lòng đăng nhập để thêm vào yêu thích.");
                    
                } else {
                    if (response === 'added') {
                        $("#favoriteIcon").removeClass("far").addClass("fas");
                    } else if (response === 'removed') {
                        $("#favoriteIcon").removeClass("fas").addClass("far");
                    }
                }
            }
            
        });
    });
});


//Xóa thể loại
$(document).ready(function() {
  $('.delete-genre-btn').on('click', function(e) {
    e.preventDefault();

    const form = $(this).closest('form');
    const genre = $(this).closest('tr').find('td').eq(1);

    if (genre.length > 0) {
      $('.modal-body').html(
        `Bạn có muốn xóa "${genre.text()}" không? Nếu xóa thì tất cả sách thuộc thể loại này cũng sẽ bị xóa.`
      );
    }

    $('#delete-confirm').modal('show'); // Hiển thị modal

    $('#delete-confirm').on('click', '#delete', function() {
      form.submit();
    });

  });
});

//Xóa sách
$(document).ready(function() {
  $('.delete-book-btn').on('click', function(e) {
    e.preventDefault();

    const form = $(this).closest('form');
    const book = $(this).closest('tr').find('td').eq(1);

    if (book.length > 0) {
      $('.modal-body').html(
        `Bạn có muốn xóa "${book.text()}" không?. Nếu xóa những thông tin liên quan đến sách cũng sẽ bị xóa.`
      );
    }

    $('#delete-confirm').modal('show'); // Hiển thị modal

    $('#delete-confirm').on('click', '#delete', function() {
      form.submit();
    });

  });
});

//Thêm và sửa sách
// hiện hình ảnh
$(document).ready(function() {
    const imgInput = $('#image');
    const previewimg = $('#book-preview');

    imgInput.change(function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = function() {

                const imgDataURL = reader.result;
                previewimg.attr('src', imgDataURL);
                previewimg.show();
            };
        }
    });
});