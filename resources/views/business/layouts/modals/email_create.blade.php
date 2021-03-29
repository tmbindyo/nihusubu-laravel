<div class="modal inmodal" id="emailRegistration" tabindex="-1" role="dialog" aria-labelledby="tagRegistrationLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-cogs modal-icon"></i>
                <h4 class="modal-title">Send Email</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" method="post" action="{{ route('business.sale.send.email',['portal'=>$institution->portal,'sale_id'=>$sale->id]) }}">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="col-md-12">
                                <br>
                                <div class="has-warning">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                        <input name="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{$sale->contact->email}}">
                                    <i>name</i>
                                </div>
                                <br>
                                <div class="has-warning">
                                    @if ($errors->has('subject'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('subject') }}</strong>
                                        </span>
                                    @endif
                                        <input name="subject" type="text" class="form-control {{ $errors->has('subject') ? ' is-invalid' : '' }}" value="@if($sale->is_estimate ==1) Estimate @elseif($sale->is_invoice ==1) Invoice @elseif($sale->is_sale==1) Sale @elseif($sale->is_order==1) Order @else Sale @endif ref #{{$sale->reference}}">
                                    <i>name</i>
                                </div>
                                <br>
                                <div class="has-warning">
                                    @if ($errors->has('body'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('body') }}</strong>
                                        </span>
                                    @endif
                                        <textarea class="summernote {{ $errors->has('body') ? ' is-invalid' : '' }}" name="body">
                                        <h3>Hello {{$sale->contact->first_name}} {{$sale->contact->last_name}}! </h3>
                                        dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's</strong> standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                                        <br/>
                                        <br/>

                                    </textarea>
                                </div>

                                <hr>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-block btn-lg btn-outline btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
