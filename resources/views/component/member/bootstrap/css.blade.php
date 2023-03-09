<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
<style>
    label.label input[type="file"] {
        position: absolute;
        top: -1000px;
      }
      .label {
        cursor: pointer;
        border: 1px solid #cccccc;
        border-radius: 5px;
        padding: 5px 15px;
        margin: 5px;
        background: #dddddd;
        display: inline-block;
      }
      .label:hover {
        background: #0062cc;
      }
      .label:active {
        background: #9fa1a0;
      }
      .label:invalid + span {
        color: #000000;
      }
      .label:valid + span {
        color: #ffffff;
      }
</style>