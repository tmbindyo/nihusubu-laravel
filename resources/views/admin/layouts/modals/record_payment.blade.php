<div class="modal inmodal" id="recordPayment" tabindex="-1" role="dialog" aria-labelledby="tagRegistrationLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-user modal-icon"></i>
                <h4 class="modal-title">Record Payment</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.record.institution.subscription.payment.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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

                    <div class="GFGclass" id="divGFG">
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="has-warning">
                                <input type="number" id="amount" name="email" required="required" placeholder="Amount" class="form-control input-lg">
                                <i>amount</i>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="has-warning">
                                <textarea id="text" rows="5" name="text" class="resizable_textarea form-control input-lg {{ $errors->has('text') ? ' is-invalid' : '' }}" required="required" placeholder="Text">{{ old('text') }}</textarea>
                                <i>text</i>
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
