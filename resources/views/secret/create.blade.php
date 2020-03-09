@extends ('app')

@section('title', 'Create')

@section('content')
    <legend>Create Shared Secret</legend>
    <form action="store" method="POST" role="form">
        <div class="form-group">
            <label for="secret">Secret</label>
            <textarea name="secret" id="secret" class="form-control" rows="1" required="required"></textarea>
            <small id="passwordHelpBlock" class="form-text text-danger">Important: Include <strong>only</strong> the secret/password; Any other identifying information (username, server, etc.) must be communicated separately.</small>
        </div>

        <div class="form-group">
            <label for="expires_time">Expiration</label>
            <fieldset class="form-inline">
                <input type="date" name="expires_date" id="expires_date" class="form-control" value="{{ $now->format('Y-m-d') }}" required="required" title="">
                <input type="time" name="expires_time" id="expires_time" class="form-control" value="{{ $now->format('H:i') }}" required="required" title="">
                <div class="input-group col-xs-2">
                    <div class="input-group-addon">UTC</div>
                    <input type="number" name="utc_offset" id="utc_offset" class="form-control" value="0" required="required" title="">
                </div>
            </fieldset>
        </div>

        <div class="form-group">
            <label for="expires_views">View Limit</label>
            <div class="input-group col-xs-2">
                <input type="number" name="expires_views" id="expires_views" class="form-control" value="5" min="1" max="" step="" required="required" title="">
            </div>
        </div>

        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop

@section('scriptFooter')
    <script>
        var offset = moment().utcOffset() / 60;
        document.getElementById("utc_offset").value = offset;
        document.getElementById("expires_time").value = moment().add(1, 'hour').format("HH:mm");
    </script>
@stop
