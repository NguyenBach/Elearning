<form method="post" enctype="multipart/form-data" action="">
    <input type="hidden" name="id" value="">
    <label for="">Full Name: </label> <input type="text" name="fullname" placeholder="Full Name" ><br>
    <label for="">Short Name: </label> <input type="text" name="shortname" placeholder="Short name"><br>
    <label for="">Introduction: </label> <textarea name="intro"  cols="30" rows="20"></textarea> <br>
    <label for="">Feature Picture: </label> <input type="file" name="featurepicture"> <br>
    <label for="">Start Date: </label> <input type="date" name="startdate"> <br>
    <label for="">Course Format:</label>
    <select name="courseformat" >
        <option value="1">Lesson</option>
    </select><br>
    <label for="">Number Of Lesson: </label> <input type="number" name="numberlessons"><br>
    <label for="">Active: </label>
    <select name="active" >
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select><br>
    <label for="">Visible: </label>
    <select name="visible" >
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select><br>
    <button type="submit">Create</button>
    <button type="button">Cancel</button>
</form>