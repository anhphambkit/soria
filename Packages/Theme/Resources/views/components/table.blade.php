<?php $class = isset($class) ? $class : ''; ?>

<table id="{{ $id }}" class="table dataTable no-footer collapsed {{ $class }}" cellspacing="0" width="100%">
    <thead>
    <tr role="row">
        @foreach($columns as $head)
        <th class="sorting">{{ $head }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($rows as $index => $row)
    <?php $rowClass = isset($row['class']) ? $row['class'] : ''; ?>
    <tr role="row" class="{{ $rowClass. ($index % 2 == 1 ? 'odd' : 'even') }}">
        @foreach($row['cells'] as $index => $cell)
            <?php $cellClass = isset($cell['class']) ? $cell['class'] : ''; ?>
            <td class="{{ $cellClass }}"><?php echo $cell['value']; ?></td>
        @endforeach
    </tr>
    @endforeach
    </tbody>
</table>