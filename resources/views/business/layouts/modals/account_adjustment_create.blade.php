{{--<div class="modal inmodal" id="toDoRegistration" tabindex="-1" role="dialog" aria-labelledby="toDoRegistrationLabel" aria-hidden="true">--}}
<div class="modal inmodal fade" id="accountAdjustmentRegistration" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-list modal-icon"></i>
                <h4 class="modal-title">Account Adjustment Registration</h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <form method="post" action="{{ route('business.account.adjustment.store',$institution->portal) }}" autocomplete="off" class="form-horizontal form-label-left">
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


                        <br>
                        {{--  accounts  --}}
                        <div class="has-warning">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('account') }}</strong>
                                </span>
                            @endif
                            <select name="account" class="select2_account form-control input-lg {{ $errors->has('account') ? ' is-invalid' : '' }}" required>
                                <option></option>
                                <option selected value="{{$account->id}}">{{$account->name}} [{{$account->balance}}]</option>
                            </select>
                            <i>account</i>
                        </div>
                        @isset($depositExists)
                            <br>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="has-warning">
                                        <select name="deposit" class="select2_deposit form-control input-lg {{ $errors->has('deposit') ? ' is-invalid' : '' }}">
                                            <option value="{{$depositExists->id}}" >{{$depositExists->reference}}[{{$depositExists->amount}}]</option>
                                        </select>
                                        <i> deposit.</i>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="has-warning">
                                        <input type="checkbox" name="is_deposit" class="js-switch_3 {{ $errors->has('is_deposit') ? ' is-invalid' : '' }}" aria-readonly="true" checked/>
                                        <br>
                                        <i>is deposit</i>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        <br>
                        {{--  amount  --}}
                        <div class="has-warning">
                            @if ($errors->has('amount'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span>
                            @endif
                            <input type="number" name="amount" value="@if(old('amount')){{ old('amount') }}@else 0 @endif" id="amount" class="form-control input-lg {{ $errors->has('amount') ? ' is-invalid' : '' }}" required>
                            <i> adjustment amount @isset($depositExists) [deposit amount ({{$depositExists->amount}})] @endisset.</i>
                        </div>
                        <br>
                        {{--  adjustment date  --}}
                        <div class="">
                            @if ($errors->has('date'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('date') }}</strong>
                                </span>
                            @endif
                            <div class="has-warning" id="data_1">
                                <div class="input-group date">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    <input type="text" name="date" id="date" value="{{ old('date') }}" class="form-control input-lg {{ $errors->has('date') ? ' is-invalid' : '' }}" required>
                                </div>
                                <i> adjustment date.</i>
                            </div>
                        </div>
                        <br>
                        {{--  notes  --}}
                        <div class="has-warning">
                            @if ($errors->has('notes'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('notes') }}</strong>
                                </span>
                            @endif
                            <textarea name="notes" placeholder="Notes" required class="form-control {{ $errors->has('notes') ? ' is-invalid' : '' }}" rows="7">{{ old('notes') }}</textarea>
                            <i> notes.</i>
                        </div>
                        <br>

                        <hr>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-block btn-outline btn-lg mt-4">{{ __('Save') }}</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
