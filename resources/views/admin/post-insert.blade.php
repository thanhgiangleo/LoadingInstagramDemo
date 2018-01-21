<form class="form-signin" method="POST" <?php !empty($post) ? print "action=\"/updatePostAction/$post->id\"" : print "action=\"insertPostAction\"" ?>>
    {{ csrf_field() }}

    <input type="text" id="slug" name="slug" class="form-control" placeholder="Đường dẫn URL (ex: cham-soc-da)" <?php if(!empty($post->slug)) echo "value= '" . $post->slug . "'" ?> required>

    <select name="category" style="margin-bottom: 10px">
        <option value="2" <?php if(!empty($post->category->id) && $post->category->id == 2) echo "selected" ?>>Oxi jet</option>
        <option value="3" <?php if(!empty($post->category->id) && $post->category->id == 3) echo "selected" ?>>Điện di</option>
        <option value="4" <?php if(!empty($post->category->id) && $post->category->id == 4) echo "selected" ?>>Điều trị mụn</option>
        <option value="5" <?php if(!empty($post->category->id) && $post->category->id == 5) echo "selected" ?>>Laser carbon</option>
        <option value="6" <?php if(!empty($post->category->id) && $post->category->id == 6) echo "selected" ?>>Triệt lông</option>
        <option value="7" <?php if(!empty($post->category->id) && $post->category->id == 7) echo "selected" ?>>Thay da vật lý</option>
        <option value="8" <?php if(!empty($post->category->id) && $post->category->id == 8) echo "selected" ?>>Phi kim điều trị mụn</option>
        <option value="9" <?php if(!empty($post->category->id) && $post->category->id == 9) echo "selected" ?>>Phi kim tái tạo căng bóng trắng sáng da</option>
        <option value="10" <?php if(!empty($post->category->id) && $post->category->id == 10) echo "selected" ?>>Phi kim điều trị tàn nhang, nám</option>
        <option value="11" <?php if(!empty($post->category->id) && $post->category->id == 11) echo "selected" ?>>Phi kim điều trị sẹo rỗ</option>
        <option value="12" <?php if(!empty($post->category->id) && $post->category->id == 12) echo "selected" ?>>PRP máu tự thân đặc trị sẹo rỗ, tái tạo da</option>
        <option value="13" <?php if(!empty($post->category->id) && $post->category->id == 13) echo "selected" ?>>Vi kim tảo sống Nhật Bản</option>
        <option value="14" <?php if(!empty($post->category->id) && $post->category->id == 14) echo "selected" ?>>Cấy tế bào gốc</option>
        <option value="15" <?php if(!empty($post->category->id) && $post->category->id == 15) echo "selected" ?>>Truyền trắng lutathion</option>
        <option value="16" <?php if(!empty($post->category->id) && $post->category->id == 16) echo "selected" ?>>Truyền noãn cao cấp Thụy Sĩ</option>
        <option value="17" <?php if(!empty($post->category->id) && $post->category->id == 17) echo "selected" ?>>Tiêm nhau thai Nhật</option>
        <option value="18" <?php if(!empty($post->category->id) && $post->category->id == 18) echo "selected" ?>>Filler</option>
        <option value="19" <?php if(!empty($post->category->id) && $post->category->id == 19) echo "selected" ?>>Botox</option>
        <option value="20" <?php if(!empty($post->category->id) && $post->category->id == 20) echo "selected" ?>>Tin tức</option>
    </select>

    English
    <input type="text" id="en-title" name="en-title" class="form-control" placeholder="Tên bài viết" <?php if(!empty($enLang->title)) echo "value= '" . $enLang->title . "'" ?>>

    <textarea class="form-control" id="en-summary-ckeditor" name="en-ckeditor"><?php if(!empty($enLang->description)) echo $enLang->description ?></textarea>


    Thailand
    <input type="text" id="tha-title" name="tha-title" class="form-control" placeholder="Tên bài viết" <?php if(!empty($thaLang->title)) echo "value= '" . $thaLang->title . "'" ?>>

    <textarea class="form-control" id="tha-summary-ckeditor" name="tha-ckeditor"><?php if(!empty($thaLang->description)) echo $thaLang->description ?></textarea>

    <button class="btn btn-lg btn-primary btn-block btn-signin"
            type="submit"><?php !empty($post) ? print "Lưu thay đổi" : print "Đăng bài" ?></button>
</form>

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>

<script>

    // This call can be placed at any point after the
    // <textarea>, or inside a <head><script> in a
    // window.onload event handler.

    // Replace the <textarea id="editor"> with an CKEditor
    // instance, using default configurations.
    CKEDITOR.replace('en-summary-ckeditor');

    CKEDITOR.replace('tha-summary-ckeditor');

</script>