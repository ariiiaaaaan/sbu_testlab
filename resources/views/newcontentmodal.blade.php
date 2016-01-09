<form id="new-content-form" >
    @if($entity == 'contents')
        <div class="form-group">
            <label for="title">title:</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="body">body:</label>
            <textarea class="form-control" id="body" name="body"></textarea>
        </div>
    @elseif($entity == 'events' )
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control" id="body" name="body"></textarea>
        </div>
        <div class="form-group">
            <label for="adress">Address:</label>
            <textarea class="form-control" id="address" name="address"></textarea>
        </div>
        <div class="form-group">
            <label for="body">Description:</label>
            <textarea class="form-control" id="address" name="body"></textarea>
        </div>
        <div class="checkbox form-group">
            <label for="highlight">Highlight:</label>
            <input type="checkbox" name="highlight">
        </div>
        <div class="form-group">
            <label>Start:</label>
            @include('dateinput',['prefix'=>"start"])
        </div>
        <div class="form-group">
            <label>End:</label>
            @include('dateinput',['prefix'=>"end"])
        </div>
    @elseif($entity == 'researches' )
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="body">Author:</label>
            <input type="text" class="form-control" id="Author" name="author">
        </div>
        <div class="form-group">
            <label for="publishe">Publisher:</label>
            <textarea class="form-control" id="publisher" name="publisher"></textarea>
        </div>
        <div class="form-group">
            <label>Publish Date:</label>
            @include('dateinput',['prefix'=>"date"])
        </div>
        <div class="form-group">
            <label for="body">Pages:</label>
            <input type="number" class="form-control" id="pages" name="pages">
        </div>
        <div class="form-group">
            <label for="body">File:</label>
            <div class="fileUpload btn btn-primary">
                <span>Upload</span>
                <input type="file" class="form-control myupload" id="file" name="path">
            </div>
        </div>
        <div class="form-group">
            <label for="abstract">Abstract:</label>
            <textarea class="form-control" id="abstract" name="abstract"></textarea>
        </div>
        <div class="form-group">
            <label for="refrences">Refrences:</label>
            <textarea class="form-control" id="refrences" name="refrences"></textarea>
        </div>
        <div class="form-group">
            <label for="keywords">Keywords:</label>
            <textarea class="form-control" id="keywords" name="keywords"></textarea>
        </div>
    @elseif($entity == 'members' )
        <div class="form-group">
            <label for="firstname">Firstname:</label>
            <input type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Lastname:</label>
            <input type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="form-group">
            <label for="emali">E-mail:</label>
            <input type="email" class="form-control" id="emila" name="email">
        </div>
        <div class="form-group">
            <label for="reaearchareas">Research Areas:</label>
            <textarea class="form-control" id="researchareas" name="researchareas"></textarea>
        </div>
        <div class="form-group">
            <label for="interests">Interests:</label>
            <textarea class="form-control" id="interests" name="interests"></textarea>
        </div>
        <div class="form-group">
            <label for="mobile">Mobile:</label>
            <input type="text" class="form-control" id="mobile" name="mobile">
        </div>
        <div class="form-group">
            <label for="telephone">Telephone:</label>
            <input type="text" class="form-control" id="telephone" name="telephone">
        </div>
        <div class="form-group">
            <label for="position">Position:</label>
            <input type="text" class="form-control" id="position" name="position">
        </div>
        <div class="form-group">
            <label for="linkedin">Linkedin:</label>
            <input type="text" class="form-control" id="linkedin" name="linkedin">
        </div>
        <div class="form-group">
            <label for="pinterest">Pinterest:</label>
            <input type="text" class="form-control" id="pinterest" name="pinterest">
        </div>
        <div class="form-group">
            <label for="instagram">Instagram:</label>
            <input type="text" class="form-control" id="instagram" name="instagram">
        </div>
        <div class="form-group">
            <label for="facebook">Facebook:</label>
            <input type="text" class="form-control" id="facebook" name="facebook">
        </div>
    @endif
    <input type="hidden" name="entity" value="{{$entity}}">
    <input type="hidden" name="type" value="{{$type}}">
    <input type="submit" value="Add" class="btn btn-primary" >
    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
</form>