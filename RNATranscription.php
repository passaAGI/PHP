<?php
    function complement($dna_strand){
        $rna_transcription = "";
        for($nucleotide = 0; $nucleotide < strlen($dna_strand); $nucleotide++){
            if($dna_strand[$nucleotide] == "G"){
                $rna_transcription .= "C";
            }
            elseif($dna_strand[$nucleotide] == "C"){
                $rna_transcription .= "G";
            }
            elseif($dna_strand[$nucleotide] == "T"){
                $rna_transcription .= "A";
            }
            elseif($dna_strand[$nucleotide] == "A"){
                $rna_transcription .= "U";
            }
        }
        echo $rna_transcription;
    }
    
    complement("GCTACCTACG");
?>
