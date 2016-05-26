<form id="new-content-form" action="insert" method="post" enctype="multipart/form-data" accept-charset="utf-8">
    @if($type != 'events' && $type != 'researches' && $type != 'members')
        <div class="form-group">
            <label for="title">title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ empty(old('title')) ? "" : old('title') }}">
        </div>
        <div class="form-group">
            <label for="body">body:</label>
            <textarea class="form-control" id="body" name="body" rows="10" cols="50" value="{{ empty(old('body')) ? "" : old('body') }}"></textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'body' );
            </script>
        </div>
        <div class="form-group">
            <label>Tags:</label>
            @include('tags',['tags'=>$tags])
        </div>
        <div class="form-group">
            <label>Category: </label>
            @include('categorysimple',['cats'=>$cats])
        </div>
        @if($type ==  "galleries")
            <div class="form-group img">
                <label>Select Images:</label>
                <input type="file" name="img[]">

                <input type="text" class="small" placeholder="Title" name="imgtitle[]" value="{{ empty(old('imgtitle')) ? "" : old('imgtitle') }}">
            </div>
            <div  class="add-img-input">Add More Images</div>
        @else
            <div class="form-group img">
                <label>Select Images:</label>
                <input type="file" name="img[]">
            </div>
        @endif

    @elseif($type == 'events' )
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ empty(old('title')) ? "" : old('title') }}">
        </div>
        <div class="form-group">
            <label for="body">Description:</label>
            <textarea class="form-control" id="body" name="body">{{ empty(old('body')) ? "" : old('body') }}</textarea>
        </div>
        <div class="form-group">
            <label for="adress">Address:</label>
            <textarea class="form-control" id="address" name="address">{{ empty(old('title')) ? "" : old('title') }}</textarea>
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
        <div class="form-group">
            <label>Select Images:</label>
            <input type="file" name="img[]" multiple>
        </div>
        <div class="form-group">
            <label>Tags: </label>
            @include('tags',['tags'=>$tags])
        </div>
        <div class="form-group">
            <label>Category: </label>
            @include('categorysimple',['cats'=>$cats])
        </div>
    @elseif($type == 'researches' )
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ empty(old('title')) ? "" : old('title') }}">
        </div>
        <div class="form-group">
            <label for="body">Author:</label>
            <input type="text" class="form-control" id="Author" name="author" value="{{ empty(old('author')) ? "" : old('author') }}">
        </div>
        <div class="form-group">
            <label for="publishe">Publisher:</label>
            <textarea class="form-control" id="publisher" name="publisher">{{ empty(old('publisher')) ? "" : old('publisher') }}</textarea>
        </div>
        <div class="form-group">
            <label>Publish Date:</label>
            @include('dateinput',['prefix'=>"date"])
        </div>
        <div class="form-group">
            <label for="body">Pages:</label>
            <input type="number" class="form-control" id="pages" name="pages" value="{{ empty(old('pages')) ? "" : old('pages') }}">
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
            <textarea class="form-control" id="abstract" name="abstract">{{ empty(old('abstract')) ? "" : old('abstract') }}</textarea>
        </div>
        <div class="form-group">
            <label for="refrences">Refrences:</label>
            <textarea class="form-control" id="refrences" name="refrences">{{ empty(old('refrences')) ? "" : old('refrences') }}</textarea>
        </div>
        <div class="form-group">
            <label for="keywords">Keywords:</label>
            <textarea class="form-control" id="keywords" name="keywords">{{ empty(old('keywords')) ? "" : old('keywords') }}</textarea>
        </div>
        <div class="form-group">
            <label>Select Images:</label>
            <input type="file" name="img[]" multiple>
        </div>
        <div class="form-group">
            <label>Tags: </label>
            @include('tags',['tags'=>$tags])
        </div>
        <div class="form-group">
            <label>Category: </label>
            @include('categorysimple',['cats'=>$cats])
        </div>
    @elseif($type == 'members' )
        <div class="form-group">
            <label for="firstname">Firstname:</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ empty(old('firstname')) ? "" : old('firstname') }}">
        </div>
        <div class="form-group">
            <label for="lastname">Lastname:</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ empty(old('lastname')) ? "" : old('lastname') }}">
        </div>
        <div class="form-group">
            <label for="emali">E-mail:</label>
            <input type="email" class="form-control" id="emila" name="email" value="{{ empty(old('email')) ? "" : old('email') }}">
        </div>
        <div class="form-group">
            <label for="reaearchareas">Research Areas:</label>
            <textarea class="form-control" id="researchareas" name="researchareas">{{ empty(old('researchareas')) ? "" : old('researchareas') }}</textarea>
        </div>
        <div class="form-group">
            <label for="interests">Interests:</label>
            <textarea class="form-control" id="interests" name="interests">{{ empty(old('interests')) ? "" : old('interests') }}</textarea>
        </div>
        <div class="form-group">
            <label for="mobile">Mobile:</label>
            <input type="text" class="form-control" id="mobile" name="mobile" value="{{ empty(old('mobile')) ? "" : old('mobile') }}">
        </div>
        <div class="form-group">
            <label for="telephone">Telephone:</label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ empty(old('telephone')) ? "" : old('telephone') }}">
        </div>
        <div class="form-group">
            <label for="position">Position:</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ empty(old('position')) ? "" : old('position') }}">
        </div>
        <div class="form-group">
            <label for="linkedin">Linkedin:</label>
            <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ empty(old('linkedin')) ? "" : old('linkedin') }}">
        </div>
        <div class="form-group">
            <label for="pinterest">Pinterest:</label>
            <input type="text" class="form-control" id="pinterest" name="pinterest" value="{{ empty(old('pinterest')) ? "" : old('pinterest') }}">
        </div>
        <div class="form-group">
            <label for="instagram">Instagram:</label>
            <input type="text" class="form-control" id="instagram" name="instagram" value="{{ empty(old('instagram')) ? "" : old('instagram') }}">
        </div>
        <div class="form-group">
            <label for="facebook">Facebook:</label>
            <input type="text" class="form-control" id="facebook" name="facebook" value="{{ empty(old('facebook')) ? "" : old('facebook') }}">
        </div>
        <div class="form-group">
            <label>Select ONE Image:</label>
                <input type="file" name="img">
        </div>
        <div class="form-group rec">
            <label>Record:</label>
            <div class="record-form">
                <div class="form-group">
                   <span>institute:</span><input type="text" class="small" name="rec[0][institute]">
                </div>
                <div class="form-group">
                    <span>position:</span><input type="text" class="small" name="rec[0][position]">
                </div>
                <div class="form-group">
                    <span>start:</span><input type="text" class="small" name="rec[0][start]">
                </div>
                <div class="form-group">
                    <span>end:</span><input type="text" class="small" name="rec[0][end]">
                </div>
                <div class="form-group">
                    <span>type:</span> <select name="rec[0][type]">
                        <option value="academic">academic</option>
                        <option value="industrial">industrial</option>
                    </select>
                </div>
            </div>
            <div  class="add-record-input">Add More Records</div>
        </div>

    @endif
    <input type="hidden" name="type" value="{{$type}}">
    <input type="hidden" name="mode" value="{{$mode}}">
        {{ csrf_field() }}
    @if($mode)
        <input type="submit" value="Add" class="btn btn-primary" >
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
    @else
        <input type="submit" value="save" class="btn btn-primary" >
    @endif
</form>