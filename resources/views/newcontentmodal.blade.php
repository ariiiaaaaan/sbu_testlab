<form id="new-content-form" action="insert" method="post" enctype="multipart/form-data" accept-charset="utf-8">
    @if($type != 'events' && $type != 'researches' && $type != 'members' && $type != 'variables' && $type != 'tags' && $type != 'categories' && $type != 'newsletter-groups')
        @if($type == "newsletters")
            <a href="nlmaker" class="btn btn-primary" id="nl-maker-link" target="_blank">Open Newsletter-Maker in new tab</a>
        @endif
        <div class="form-group">
            <label for="title">title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ empty($old->title) ? "" : $old->title }}">
        </div>
        <div class="form-group">
            <label for="body">body:</label>
            <textarea class="form-control ckedit" id="body" name="body" rows="10" cols="50">{{ empty($old->body) ? "" : $old->body }}</textarea>
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
            @include('categorysimple',['nodes'=>$cats,'level'=>0])
        </div>
        @if($type ==  "galleries")
            @if($mode == 0)
            @foreach($old->photos as $key => $photo)
                <div class="form-group img-old">
                    <label>Old Image:</label>
                    <img src="{{$photo->path}}">
                    <label for="delete">Delete
                        <input type="checkbox" name="oldimg[{{$key}}][delete]" id="delete">
                    </label>
                    <input type="text" disabled="disabled" class="small" placeholder="Title" value="{{ empty($photo->title) ? "" : $photo->title }}">
                    <input type="hidden" name="oldimg[{{$key}}][id]" value="{{$photo->id}}">
                </div>
            @endforeach
            @endif
            <div class="form-group img">
                <label>Select Images:</label>
                <input type="file" name="img[]">
                <input type="text" class="small" placeholder="Title" name="imgtitle[]">
            </div>
            <div  class="add-img-input">Add More Images</div>
        @else
            @if($mode == 0)
                @foreach($old->photos as $key => $photo)
                    <div class="form-group img-old">
                        <label>Old Image:</label>
                        <img src="{{$photo->path}}">
                    </div>
                @endforeach
            @endif
            <div class="form-group img">
                <label>Select Image:</label>
                <input type="file" name="img[]">
            </div>
        @endif



    @elseif($type == 'events' )
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ empty($old->content->title) ? "" : $old->content->title }}">
        </div>
        <div class="form-group">
            <label for="body">Description:</label>
            <textarea class="form-control" id="body" name="body">{{ empty($old->content->body) ? "" : $old->content->body }}</textarea>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" id="address" name="address">{{ empty($old->address) ? "" : $old->address }}</textarea>
        </div>

        <div class="checkbox form-group">
            <label for="highlight">Highlight:</label>
            <input type="checkbox" name="highlight">
        </div>
        <div class="form-group">
            <label>Start:</label>
            @include('dateinput',['prefix'=>"start",'date' => isset($old->start) ? $old->start : "0|0|0|0|0"])
        </div>
        <div class="form-group">
            <label>End:</label>
            @include('dateinput',['prefix'=>"end",'date' => isset($old->end) ? $old->end : "0|0|0|0|0"])
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
            @include('categorysimple',['nodes'=>$cats,'level'=>0])
        </div>
    @elseif($type == 'researches' )
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ empty($old->content->title) ? "" : $old->content->title }}">
        </div>
        <div class="form-group">
            <label for="body">Author:</label>
            <input type="text" class="form-control" id="Author" name="author" value="{{ empty($old->author) ? "" : $old->author }}">
        </div>
        <div class="form-group">
            <label for="publishe">Publisher:</label>
            <textarea class="form-control" id="publisher" name="publisher">{{ empty($old->publisher) ? "" : $old->publisher }}</textarea>
        </div>
        <div class="form-group">
            <label>Publish Date:</label>
            @include('dateinput',['prefix'=>"date",'date' => isset($old->date) ? $old->date : "0|0|0|0|0"])
        </div>
        <div class="form-group">
            <label for="body">Pages:</label>
            <input type="number" class="form-control" id="pages" name="pages" value="{{ empty($old->pages) ? "" : $old->pages }}">
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
            <textarea class="form-control" id="abstract" name="abstract">{{ empty($old->abstract) ? "" : $old->abstract }}</textarea>
        </div>
        <div class="form-group">
            <label for="refrences">Refrences:</label>
            <textarea class="form-control" id="refrences" name="refrences">{{ empty($old->refrences) ? "" : $old->refrences }}</textarea>
        </div>
        <div class="form-group">
            <label for="keywords">Keywords:</label>
            <textarea class="form-control" id="keywords" name="keywords">{{ empty($old->keywords) ? "" : $old->keywords }}</textarea>
        </div>
        <div class="form-group">
            <label>Select File:</label>
            <input type="file" name="img[]" multiple>
        </div>
        <div class="form-group">
            <label>Tags: </label>
            @include('tags',['tags'=>$tags])
        </div>
        <div class="form-group">
            <label>Category: </label>
            @include('categorysimple',['nodes'=>$cats,'level'=>0])
        </div>
    @elseif($type == 'members' )
        <div class="form-group">
            <label for="firstname">Firstname:</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ empty($old->firstname) ? "" : $old->firstname }}">
        </div>
        <div class="form-group">
            <label for="lastname">Lastname:</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ empty($old->lastname) ? "" : $old->lastname }}">
        </div>
        <div class="form-group">
            <label for="emali">E-mail:</label>
            <input type="email" class="form-control" id="emila" name="email" value="{{ empty($old->email) ? "" : $old->email }}">
        </div>
        <div class="form-group">
            <label for="reaearchareas">Research Areas:</label>
            <textarea class="form-control" id="researchareas" name="researchareas">{{ empty($old->researchareas) ? "" : $old->researchareas }}</textarea>
        </div>
        <div class="form-group">
            <label for="industry">Industrial Areas:</label>
            <textarea class="form-control" id="industry" name="industry">{{ empty($old->industry) ? "" : $old->industry }}</textarea>
        </div>
        <div class="form-group">
            <label for="mobile">Mobile:</label>
            <input type="text" class="form-control" id="mobile" name="mobile" value="{{ empty($old->mobile) ? "" : $old->mobile }}">
        </div>
        <div class="form-group">
            <label for="telephone">Telephone:</label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ empty($old->telephone) ? "" : $old->telephone }}">
        </div>
        <div class="form-group">
            <label for="position">Position:</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ empty($old->position) ? "" : $old->position }}">
        </div>
        <div class="form-group">
            <label for="linkedin">Linkedin:</label>
            <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ empty($old->linkedin) ? "" : $old->linkedin }}">
        </div>
        <div class="form-group">
            <label for="googleplus">Google Plus:</label>
            <input type="text" class="form-control" id="googleplus" name="googleplus" value="{{ empty($old->googleplus) ? "" : $old->googleplus }}">
        </div>
        <div class="form-group">
            <label for="twitter">Twitter:</label>
            <input type="text" class="form-control" id="twitter" name="twitter" value="{{ empty($old->twitter) ? "" : $old->twitter }}">
        </div>
        <div class="form-group">
            <label for="facebook">Facebook:</label>
            <input type="text" class="form-control" id="facebook" name="facebook" value="{{ empty($old->facebook) ? "" : $old->facebook }}">
        </div>
        <div class="form-group">
            <label>Select ONE Image:</label>
                <input type="file" name="img">
        </div>
        <div class="form-group">
            <label>Select C.V. file:</label>
            <input type="file" name="cv">
        </div>
    @if($mode == 0)
        <div class="form-group">
            <img style="width: 100px; margin: 10px" class="old" src="{{empty($old->photo->path) ? "" : $old->photo->path}}">
        </div>
    @endif
        <div class="form-group rec" style="min-height: 100px">
            @if($mode)
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
            @else
                @foreach($old->records as $key => $rec)
                    <div></div>
                    <label>Record:</label>
                    <div class="record-form">
                        <div class="form-group">
                            <span>institute:</span><input type="text" class="small" name="rec[{{$key}}][institute]" value="{{$rec->institute}}">
                        </div>
                        <div class="form-group">
                            <span>position:</span><input type="text" class="small" name="rec[{{$key}}][position]" value="{{$rec->position}}">
                        </div>
                        <div class="form-group">
                            <span>start:</span><input type="text" class="small" name="rec[{{$key}}][start]" value="{{$rec->start}}">
                        </div>
                        <div class="form-group">
                            <span>end:</span><input type="text" class="small" name="rec[{{$key}}][end]" value="{{$rec->end}}">
                        </div>
                        <div class="form-group">
                            <span>type:</span> <select name="rec[{{$key}}][type]">
                                <option value="academic" @if($rec->type == 'academic') selected @endif>academic</option>
                                <option value="industrial" @if($rec->type == 'industrial') selected @endif>industrial</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <span> DELETE </span><input type="checkbox" name="rec[{{$key}}][delete] ">
                        </div>
                    </div>
                @endforeach
            @endif
            <div  class="add-record-input">Add More Records</div>
        </div>

    @elseif($type == 'variables')
            <div class="form-group">
                <label for="section">Section:</label>
                <input type="text" class="form-control" disabled id="section" name="section" value="{{ empty($old->section) ? "" : $old->section }}">
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <textarea class="form-control" id="title" name="title" rows="10" cols="50">{{ empty($old->title) ? "" : $old->title }}</textarea>
            </div>
            <div class="form-group">
                <label for="subtitle">Subtitle:</label>
                <textarea class="form-control" id="subtitle" name="subtitle" rows="10" cols="50">{{ empty($old->subtitle) ? "" : $old->subtitle }}</textarea>
            </div>
            @if(!empty($old->section) && $old->section == "logo")
            <div class="form-group img">
                <label>Select Image:</label>
                <input type="file" name="body">
            </div>
            <div class="form-group">
                <label for="body">body:</label>
                <textarea class="form-control" id="body" disabled name="body" rows="10" cols="50">{{ empty($old->body) ? "" : $old->body }}</textarea>
            </div>
            @else
            <div class="form-group">
                <label for="body">body:</label>
                <textarea class="form-control" id="body" name="body" rows="10" cols="50">{{ empty($old->body) ? "" : $old->body }}</textarea>
            </div>
            @endif
    @elseif($type == 'tags')
        <div class="text-center text-success"> enter tags separated with '#' and no space</div>
        <br>
        <div class="form-group">
            <label for="body">tags:</label>
            <textarea class="form-control" id="body" name="body" rows="10" cols="50">{{ empty($old->body) ? "" : $old->body }}</textarea>
        </div>
    @elseif($type == 'categories')
        <div class="text-center text-success"> select parent and enter category title, dont select parent to add a root</div>
        <br>
        <div class="form-group">
            <label>Category: </label>
            @include('categorysimple',['nodes'=>$cats,'level'=>0])
        </div>
        <div class="form-group">
            <label for="title">title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ empty($old->title) ? "" : $old->title }}">
        </div>
    @elseif($type == 'newsletter-groups')
        <div class="text-center text-success"> enter NAME:EMAIL separated with '#' and no space</div>
        <div class="form-group">
            <label for="title">title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ empty($old->title) ? "" : $old->title }}">
        </div>
        <div class="form-group">
            <label for="body">Emails:</label>
            <textarea class="form-control" id="body" name="body" rows="10" cols="50">{{ empty($old->body) ? "" : $old->body }}</textarea>
        </div>
    @endif
    <input type="hidden" name="type" value="{{$type}}">
    <input type="hidden" name="mode" value="{{$mode}}">
        {{ csrf_field() }}
    @if($mode)
        <input type="submit" value="Add" class="btn btn-primary" >
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
    @else
            <input type="hidden" name="id" value="{{$old->id}}">
            <input type="submit" value="save" class="btn btn-primary" >
    @endif
</form>