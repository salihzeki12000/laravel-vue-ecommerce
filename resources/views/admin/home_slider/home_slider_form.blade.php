@extends('admin/template')
@section('main')
<div class="content" ng-controller="homeSliderController">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header card-header-rose card-header-text">
          <div class="card-text">
            <h4 class="card-title">{{$form_name}}</h4>
          </div>
        </div>
        <div class="card-body ">
          {!! Form::open(['url' => $form_action, 'class' => 'form-horizontal','id'=>'home_slider_form','files'=>'true']) !!}
            @csrf
            <input type="hidden" name="action" class="form_type" value="{{$form_type}}">
            <div class="row">
              <label for="input_language" class="col-sm-2 col-form-label">Language<em class="text-danger">*</em></label>
              <div class="col-sm-6">
                <div class="form-group">
                  {!! Form::select('language', $language, 'en', ['class' => 'form-control', 'id' => 'input_language', 'disabled' =>'disabled']) !!}
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">@lang('admin_messages.title')<span class="required text-danger">*</span></label>
              <div class="col-sm-6">
                <div class="form-group">
                  {!! Form::text('title',@$slider->title, ['class' => 'form-control','size'=>'3x3', 'id' => 'input_reason','maxlength'=> '55']) !!}
                      <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">@lang('admin_messages.description')<span class="required text-danger">*</span></label>
              <div class="col-sm-6">
                <div class="form-group">
                {!! Form::text('description',@$slider->description, ['class' => 'form-control','size'=>'3x3', 'id' => 'input_reason','maxlength'=> '150']) !!}
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                </div>
              </div>
            </div>
            <input type="hidden" name="id" value="{{@$slider->id}}">
            <div class="row">
              <label class="col-md-2 col-form-label">
                @lang('admin_messages.image')<span class="required text-danger">*</span>
              </label>
              <div class="col-md-4">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail">
                    @if(isset($slider->slider_image))                    
                    <img src="{{env('IMG_CLOUD_URL')}}{{$slider->slider_image}}?force_format=webp" alt="...">
                    @endif
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail"></div>
                  <div class="image_upload">
                    <span class="btn btn-rose btn-round btn-file">
                      <span class="fileinput-new">@lang('admin_messages.select_image')</span>
                      <span class="fileinput-exists">@lang('admin_messages.change')</span>
                      {!! Form::file('image',['class' => 'form-control', 'id' => 'image','data-error-placement'=>'container','data-error-container'=>'#error-box']) !!}
                    </span>
                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> @lang('admin_messages.remove')</a>
                    <span id="error-box"></span>
                  </div>
                  <span class="text-danger d-block">{{ $errors->first('image') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">@lang('admin_messages.status')<span class="required text-danger">*</span></label>
              <div class="col-sm-6">
                <div class="form-group">
                  {!! Form::select('status',['1'=>trans('admin_messages.active'),'0'=>trans('admin_messages.inactive')],@$slider->status, ['placeholder' => trans('admin_messages.select'),'class'=>'form-control']); !!}
                  <span class="text-danger">{{ $errors->first('status') }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">@lang('admin_messages.type')<span class="required text-danger">*</span></label>
              <div class="col-sm-6">
                <div class="form-group">
                  {!! Form::select('type',$typeArray,@$slider->type, ['placeholder' => trans('admin_messages.select'),'class'=>'form-control']); !!}
                  <span class="text-danger">{{ $errors->first('type') }}</span>
                </div>
              </div>
            </div>
            @if(@$slider->translations)
            <span ng-init="translations = {{json_encode(old('translations') ?: $slider->translations)}};"></span>
            @else
            <span ng-init="translations = {{json_encode(old('translations') ?: array())}};"></span>
            @endif
            <div class="panel" ng-init="removed_translations =  []; errors = {{json_encode($errors->getMessages())}};" ng-cloak>
        
              <div class="panel-body">
                <input type="hidden" name="removed_translations" ng-value="removed_translations.toString()">
                <div  ng-repeat="translation in translations">
                  <div class="col-sm-12 static_remove">
                    <button class="btn btn-danger btn-xs" ng-click="translations.splice($index, 1); removed_translations.push(translation.id)">
                    Remove
                    </button>
                  </div>
                  <input type="hidden" name="translations[@{{$index}}][id]" value="@{{translation.id}}">
                    
                  <div class="panel-header">
                    <h4 class="box-title text-center">Translations</h4>
                  </div>
            
                  <div class="row" >
                    <label for="input_language_@{{$index}}" class="col-sm-2 col-form-label">Language<em class="text-danger">*</em></label>
                    <div class="col-sm-6">
                      <div class="form-group">
                      <select name="translations[@{{$index}}][locale]" class="form-control" id="input_language_@{{$index}}" ng-model="translation.locale" >
                        <option value="" ng-if="translation.locale == ''">Select Language</option>
                        @foreach($language as $key => $value)
                          <option value="{{$key}}" ng-if="(('{{$key}}' | checkKeyValueUsedInStack : 'locale': translations) || '{{$key}}' == translation.locale) && '{{$key}}' != 'en'">{{$value}}</option>
                        @endforeach
                      </select>
                      <span class="text-danger ">@{{ errors['translations.'+$index+'.locale'][0] }}</span>
                    </div>
                  </div>
              
                </div>

                <div class="row">
                  <label for="input_name_@{{$index}}" class="col-sm-2 col-form-label">@lang('admin_messages.title')<span class="required text-danger">*</span></label>
                  <div class="col-sm-6">
                    <div class="form-group">
                    {!! Form::text('translations[@{{$index}}][title]', '@{{translation.title}}', ['class' => 'form-control', 'id' => 'input_name_@{{$index}}', 'placeholder' => 'Title','maxlength'=> '55']) !!}
                      <span class="text-danger">@{{ errors['translations.'+$index+'.title'][0] }}</span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">@lang('admin_messages.description')<span class="required text-danger">*</span></label>
                  <div class="col-sm-6">
                    <div class="form-group">                         
                      
                      {!! Form::text('translations[@{{$index}}][description]', '@{{translation.description}}', ['class' => 'form-control', 'id' => 'input_content_@{{$index}}', 'placeholder' => 'Description','maxlength'=> '150']) !!}

                      <span class="text-danger">@{{ errors['translations.'+$index+'.description'][0] }}</span>

                    </div>
                  </div>
                </div>

                <legend ng-if="$index+1 < translations.length"></legend>
              </div>
            </div>
            <div class="panel-footer">
              <div class="row" ng-show="translations.length <  {{count($language) - 1}}">
                <div class="col-sm-12">
                  <button type="button" class="btn btn-info" ng-click="translations.push({locale:''});" >
                    <!-- <i class="fa fa-plus"></i> -->
                      Add Translation
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="ml-auto">
              <button class="btn btn-fill btn-rose btn-wd" type="submit"  value="site_setting">
                @lang('admin_messages.submit')
              </button>
            </div>
            <div class="clearfix"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</div>
@endsection