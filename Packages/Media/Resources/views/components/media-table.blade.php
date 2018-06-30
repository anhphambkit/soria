@component('theme::components.table')
@slot('id', $id)
<?php $rows = []; $cols = ['ID', 'Type', 'Name', 'Updated', 'Action']; ?>
@slot('columns', $cols)
@foreach($files as $i => $media)
    <?php
    $rows[$i]['cells'][0]['value'] = '#'. ($i+1);
    $typeIcon = '<img src="'. asset('packages/media/vendors/images/file/'. strtolower($media->type). '.svg'). '" style="width:32px;height:32px" />';
    if(in_array($media->type, ['jpg', 'jpeg', 'png', 'bmp']) ){
        $typeIcon = '<img src="'. asset('storage/'. $media->path_small). '" />';
    }
    $rows[$i]['cells'][1]['value'] = $typeIcon;
    $rows[$i]['cells'][2]['value'] = '<a href="'. asset('storage/'. $media->path_org). '" target="_blank">'. $media->name. '</a>';
    $rows[$i]['cells'][3]['value'] = $media->updated_at;

    if(isset($mode) && $mode ==='add' ){
        $rows[$i]['cells'][4]['value'] = '<i class="fi fi-circle-plus btn-action" data-action="add" data-id="'. $media->getKey() .'" data-target="'. $media->path_org. '"></i>';
    } else {
        $rows[$i]['cells'][4]['value'] = '';
    }

    $rows[$i]['cells'][4]['value'] .= '<i class="fi fi-trash btn-action" data-action="del" data-target="'. $media->getKey(). '" onclick="deleteMedia('. $media->getKey().')"></i>';


    ?>
@endforeach
@slot('rows', $rows)
@endcomponent
<!-- Media script -->
<script>
    function deleteMedia(id){
        swal({
            title:"{{ trans('media::media.confirm-delete-msg') }}",
            text:"{{ trans('media::media.confirm-delete-warn-msg') }}",
            type:"warning",
            showCancelButton:true,
            confirmButtonClass:"btn btn-confirm mt-2",
            cancelButtonClass:"btn btn-cancel ml-2 mt-2",
            confirmButtonText:"{{ trans('media::media.yes-confirm-delete-btn') }}"
        })
        .then(function() {
            axios.delete(requestDeleteMedia, { params: { id}}).then( () => {
                swal("Completed", "Delete file successfully!", "success");
                location.reload();
            });
        })
        .catch(function(){});
    }
    var requestDeleteMedia = '{{ route('ajax.media.delete') }}';
    $(document).ready(function() {
        $('#{{ $id }}').DataTable({
            bSort: false,
        });
    });
</script>