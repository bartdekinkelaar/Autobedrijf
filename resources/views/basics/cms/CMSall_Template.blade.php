@extends('basics.cms.basepage')
@section('title', $pagename)
@section('main')
    <div class="row cmsVoertuigen cmsComponent">
        <div class="voertuigen_container cnt vC componentenCnt">
            <div class="vC_part componentenPart">
                <div class="vC_nieuw vC_item componentenItem">
                    <table class="table cI_tabel">
                        <?php
                        $itemType_single = $cmsAll_info->item_type_single;
                        $itemType_long   = $cmsAll_info->item_type_long;
                        $data = explode(',', $tableValues);
//                        $valueArray = array($data);
                        $Available_types    = array();
                        $merkArray          = array($merken);
                        $optioncount    = 1;
                        $datacount = count($data);
                        $itemcounter = count($getItems);
                        $itemcountmin   = $itemcounter - 1;

                        foreach($data as $ItDa => $itemData) {
                            foreach($getItems as $it => $item) {
                                $types = array();
                                for($i = 0; $i < $datacount; $i++){
                                    $types[] = $data[$i];
                                }
                                echo "<tr>";
                                foreach($types as $n => $typo) {
                                    if($it == 0) {
                                        if($n == 0) {
                                            echo "<td>#</td>";
                                        }
                                        echo "<td>$typo</td>";
                                        $optioncount++;
                                    }
                                }
                                echo "</tr>";
                                echo "<tr>";
                                foreach($types as $tI => $typo_item) {
                                    if($tI  == 0) {
                                        echo "<td>$item->id</td>";
                                    }
                                    $item->merk     = $item->merk_id;
                                    $merk_id   = $item->merk;
                                    $merk = $merken->where('merk_id', $merk_id)->first();
                                    $item->merk = $merk->merknaam;
                                    echo "<td>" . $item->$typo_item . "</td>";
                                }
                            }
                            if($ItDa == $itemcountmin) {
                                echo "<p> $datacount </p>";
                                break;
                            }
                            if(end($data)) {
                                break;
                            }
                        };
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection