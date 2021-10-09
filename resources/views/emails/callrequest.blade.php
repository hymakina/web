@extends('emails.layout.default')

@section('content')

    <h1 style="box-sizing: border-box; color: #2F3133; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 19px; font-weight: bold; margin-top: 0;"
        align="left">{!! _uit("email.callrequest.Site Call Request") !!}
    </h1>

    <p style="box-sizing: border-box; color: #74787E; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;"
       align="left">
        {!! _uit("email.callrequest.New Call Request") !!}:
    </p>
    <table class="attributes" width="100%" cellpadding="0" cellspacing="0"
           style="box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; margin: 0 0 21px;">
        <tr>
            <td class="attributes_content"
                style="box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; padding: 16px; word-break: break-word;"
                bgcolor="#EDEFF2">
                <table width="100%" cellpadding="0" cellspacing="0"
                       style="box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
                    <tr>
                        <td class="attributes_item"
                            style="box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; padding: 0; word-break: break-word;">
                            <strong style="box-sizing: border-box; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">{!! _uit("email.callrequest.Phone") !!}: </strong> {{ $phone }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

@stop