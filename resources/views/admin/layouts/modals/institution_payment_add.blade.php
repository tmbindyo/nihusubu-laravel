<div class="modal inmodal" id="recordInstitutionPayment" tabindex="-1" role="dialog" aria-labelledby="tagRegistrationLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-user modal-icon"></i>
                <h4 class="modal-title">Institution Direct Payment</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.record.institution.subscription.payment') }}" autocomplete="off" class="form-horizontal form-label-left">
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

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="has-warning">
                                <select name="institution" data-placeholder="Choose a institution..." class="chosen-select"  tabindex="2">
                                    <option></option>
                                    @foreach($institutions as $institution)
                                        <option value="{{$institution->id}}">{{$institution->name}} ({{$institution->amount}})</option>
                                    @endforeach()
                                </select>
                                <i>institution</i>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="text-center">
                        <button type="submit" class="btn btn-block btn-outline btn-lg btn-success mt-4">{{ __('Save') }}</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
