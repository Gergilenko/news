<div id="years" class="block">
    <div class="head">Новости</div>
    <ul>
        <?php foreach ($menu as $year => $month): ?>
            <li><a href="<?php $this->url('news/date/' . $year); ?>"><?php echo $year; ?></a></li>
                <ul>
                    <?php foreach ($menu[$year] as $month => $count):
                        $url = $year . "-" . $month;
                        //replace "MM" with "month"
                        switch($month) {
                            case "01": $month = "январь"; break;
                            case "02": $month = "февраль"; break;
                            case "03": $month = "март"; break;
                            case "04": $month = "апрель"; break;
                            case "05": $month = "май"; break;
                            case "06": $month = "июнь"; break;
                            case "07": $month = "июль"; break;
                            case "08": $month = "август"; break;
                            case "09": $month = "сентябрь"; break;
                            case "10": $month = "октябрь"; break;
                            case "11": $month = "ноябрь"; break;
                            case "12": $month = "декабрь"; break;
                            default: $month = "month";
                        } ?>

                    <li><a href="<?php $this->url('news/date/' . $url); ?>"><?php echo $month . ' (' . $count . ')'; ?></a></li>
                    <?php endforeach; ?>
                </ul>
        <?php endforeach; ?>
    </ul>
</div>
<div id="topics" class="block">
    <div class="head">Темы</div>
    <ul>
      <?php foreach ($topics as $item): ?>
            <li><a href="<?php $this->url('news/topic/' . $item['id']); ?>"><?php echo $item['title'] . ' (' . $item['count'] . ')'; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>

