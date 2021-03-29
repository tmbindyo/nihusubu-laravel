<div class="modal inmodal" id="smsRegistration" tabindex="-1" role="dialog" aria-labelledby="tagRegistrationLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-cogs modal-icon"></i>
                <h4 class="modal-title">Send SMS</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" method="post" action="{{ route('business.sale.send.sms',['portal'=>$institution->portal,'sale_id'=>$sale->id]) }}">
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
                                    @if ($errors->has('phone_number'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        </span>
                                    @endif
                                    <input type="text" id="phone_number" name="phone_number" required="required" value="{{ old('phone_number') }}" placeholder="Phone number" class="form-control input-lg" value="{{$sale->contact->phone_number}}">
                                    <i>name</i>
                                </div>

                                <br>
                                <div class="has-warning">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                    <textarea class="summernote {{ $errors->has('body') ? ' is-invalid' : '' }}" name="body"></textarea>
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
