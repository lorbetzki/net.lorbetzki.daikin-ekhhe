<?php
declare(strict_types=1);
$DP = [
    'DD' => [
            'A' =>      [ 'Desc' => $this->Translate("(A) Lower water temperature probe"), 'HEXPos'=> 7, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 0, 'isVar' => true, 'Action' => false ],  
            'B' =>      [ 'Desc' => $this->Translate("(B) Upper water temperature probe"), 'HEXPos'=> 6, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 0, 'isVar' => true, 'Action' => false ],
            'C' =>      [ 'Desc' => $this->Translate("(C) Defrosting temperature probe"), 'HEXPos'=> 8, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 0, 'isVar' => true, 'Action' => false ],
            'D' =>      [ 'Desc' => $this->Translate("(D) Supply-air temperature probe"), 'HEXPos'=> 10, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 0, 'isVar' => true, 'Action' => false ],
            'E' =>      [ 'Desc' => $this->Translate("(E) Evaporator inlet gas temperature probe"), 'HEXPos'=> 11, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 0, 'isVar' => true, 'Action' => false ],
            'F' =>      [ 'Desc' => $this->Translate("(F) Evaporator outlet gas temperature probe"), 'HEXPos'=> 12, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 0, 'isVar' => true, 'Action' => false ],
            'G' =>      [ 'Desc' => $this->Translate("(G) Compressor discharge gas temperature probe"), 'HEXPos'=> 13, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 0, 'isVar' => true, 'Action' => false ],
            'H' =>      [ 'Desc' => $this->Translate("(H) Solar collector temperature probe (PT1000)"), 'HEXPos'=> 14, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 0, 'isVar' => true, 'Action' => false ],
            'I' =>      [ 'Desc' => $this->Translate("(I) EEV opening step"), 'HEXPos'=> 18, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "", 'Pos' => 0, 'isVar' => true, 'Action' => false ],

            'DIG' =>    [ 'Desc' => $this->Translate("Dummy Digital"), 'HEXPos'=> 21, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "", 'Pos' => 0, 'isVar' => false, 'Action' => false ],
            ],
    'CC' => [
            
            'Power'   =>    [ 'Desc' => $this->Translate("power"), 'HEXPos'=> 1, 'Type' => VARIABLETYPE_BOOLEAN, 'Profile' => "~Switch", 'Pos' => 0, 'isVar' => true, 'Action' => true ],
            'Mode'    =>    [ 'Desc' => $this->Translate("mode"), 'HEXPos'=> 3, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Mode", 'Pos' => 0, 'isVar' => true, 'Action' => true ],
            'SetTemp' =>    [ 'Desc' => $this->Translate("set temperature"), 'HEXPos'=> 13, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.SetTemp", 'Pos' => 0, 'isVar' => true, 'Action' => true ],

            'P4'      =>    [ 'Desc' => $this->Translate("(P4) Antilegionella duration"), 'HEXPos'=> 4, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Duration", 'Pos' => 104, 'isVar' => true, 'Action' => false ],
            'P2'      =>    [ 'Desc' => $this->Translate("(P2) Electrical heater switching-on delay"), 'HEXPos'=> 7, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Duration", 'Pos' => 102, 'isVar' => true, 'Action' => false ],
            'P1'      =>    [ 'Desc' => $this->Translate("(P1) Hysteresis on lower water probe for heat-pump working"), 'HEXPos'=> 20, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 101, 'isVar' => true, 'Action' => false ],        
            'P3'      =>    [ 'Desc' => $this->Translate("(P3) Antilegionella setpoint temperature"), 'HEXPos'=> 22, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 103, 'isVar' => true, 'Action' => false ],
            'P24'     =>    [ 'Desc' => $this->Translate("(P24) Off-peak working mode"), 'HEXPos'=> 30, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.P24", 'Pos' => 124, 'isVar' => true, 'Action' => false ],
            'P16'     =>    [ 'Desc' => $this->Translate("(P16) Solar mode integration"), 'HEXPos'=> 31, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.P16", 'Pos' => 116, 'isVar' => true, 'Action' => false ],
            'P23'     =>    [ 'Desc' => $this->Translate("(P23) Photovoltaic mode integration"), 'HEXPos'=> 32, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.P23", 'Pos' => 123, 'isVar' => true, 'Action' => false ],
            'P7'      =>    [ 'Desc' => $this->Translate("(P7) Delay between two consecutive defrosting cycle"), 'HEXPos'=> 5, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Duration", 'Pos' => 107, 'isVar' => true, 'Action' => false ],
            'P10'     =>    [ 'Desc' => $this->Translate("(P10) Maximum defrosting duration"), 'HEXPos'=> 6, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Duration", 'Pos' => 110, 'isVar' => true, 'Action' => false ],
            'P29'     =>    [ 'Desc' => $this->Translate("(P29) Antilegionella starting hour"), 'HEXPos'=> 9, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.DurationH", 'Pos' => 129, 'isVar' => true, 'Action' => false ],
            'P31'     =>    [ 'Desc' => $this->Translate("(P31) Heatpump working period in AUTO mode for heating rate calculation"), 'HEXPos'=> 10, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Duration", 'Pos' => 131, 'isVar' => true, 'Action' => false ],
            'P8'      =>    [ 'Desc' => $this->Translate("(P8) Temperature threshold for defrosting start"), 'HEXPos'=> 11, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 108, 'isVar' => true, 'Action' => false ],
            'P9'      =>    [ 'Desc' => $this->Translate("(P9) Temperature threshold for defrosting stop"), 'HEXPos'=> 12, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 109, 'isVar' => true, 'Action' => false ],
            'P32'     =>    [ 'Desc' => $this->Translate("(P32) Temperature threshold for electrical heater usage in AUTO mode"), 'HEXPos'=> 21, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 132, 'isVar' => true, 'Action' => false ],
            'P30'     =>    [ 'Desc' => $this->Translate("(P30) Hysteresis on upper water probe for electrical heater working"), 'HEXPos'=> 23, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 130, 'isVar' => true, 'Action' => false ],
            'P25'     =>    [ 'Desc' => $this->Translate("(P25) Offset value on upper water temp probe"), 'HEXPos'=> 24, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 125, 'isVar' => true, 'Action' => false ], 
            'P26'     =>    [ 'Desc' => $this->Translate("(P26) Offset value on lower water temp probe"), 'HEXPos'=> 25, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 126, 'isVar' => true, 'Action' => false ],
            'P27'     =>    [ 'Desc' => $this->Translate("(P27) Offset value on air-inlet temp probe"), 'HEXPos'=> 26, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 127, 'isVar' => true, 'Action' => false ],
            'P28'     =>    [ 'Desc' => $this->Translate("(P28) Offset value on defrosting temp probe"), 'HEXPos'=> 27, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 128, 'isVar' => true, 'Action' => false ],
            'P12'     =>    [ 'Desc' => $this->Translate("(P12) External pump usage mode"), 'HEXPos'=> 28, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.P12", 'Pos' => 112, 'isVar' => true, 'Action' => false ],
            'P14'     =>    [ 'Desc' => $this->Translate("(P14) Type of evaporator fan"), 'HEXPos'=> 29, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.P14", 'Pos' => 114, 'isVar' => true, 'Action' => false ],
            'P17'     =>    [ 'Desc' => $this->Translate("(P17) Heat-pump starting delay after DIG1 opening"), 'HEXPos'=> 33, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Duration", 'Pos' => 117, 'isVar' => true, 'Action' => false ],
            'P18'     =>    [ 'Desc' => $this->Translate("(P18) Lower water probe temperature value to stop the heat-pump in solar mode integration"), 'HEXPos'=> 34, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 118, 'isVar' => true, 'Action' => false ],
            'P19'     =>    [ 'Desc' => $this->Translate("(P19) Hysteresis on lower water probe to start the pump in solar mode integration"), 'HEXPos'=> 35, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 119, 'isVar' => true, 'Action' => false ],
            'P20'     =>    [ 'Desc' => $this->Translate("(P20) Temperature threshold for solar drain valve / solar collector roll-up shutter action in solar mode integration"), 'HEXPos'=> 36, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 120, 'isVar' => true, 'Action' => false ],
            'P21'     =>    [ 'Desc' => $this->Translate("(P21) Lower water probe temperature value to stop the heat-pump in photovoltaic mode integration"), 'HEXPos'=> 37, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 121, 'isVar' => true, 'Action' => false ],
            'P22'     =>    [ 'Desc' => $this->Translate("(P22) Upper water probe temperature value to stop the electrical heater in photovoltaic mode integration"), 'HEXPos'=> 38, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 122, 'isVar' => true, 'Action' => false ],
            'P34'     =>    [ 'Desc' => $this->Translate("(P34) Superheating calculation period for EEV automatic control mode"), 'HEXPos'=> 39, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.DurationS", 'Pos' => 134, 'isVar' => true, 'Action' => false ],
            'P37'     =>    [ 'Desc' => $this->Translate("(P37) EEV step opening during defrosting mode (x10)"), 'HEXPos'=> 40, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "", 'Pos' => 137, 'isVar' => true, 'Action' => false ],
            'P38'     =>    [ 'Desc' => $this->Translate("(P38) Minimum EEV step opening with automatic control mode (x10)"), 'HEXPos'=> 41, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "", 'Pos' => 138, 'isVar' => true, 'Action' => false ],

            'P40'     =>    [ 'Desc' => $this->Translate("(P40) Initial EEV step opening with automatic control mode / EEV step opening with manual control mode (x10)"), 'HEXPos'=> 42, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "", 'Pos' => 140, 'isVar' => true, 'Action' => false ],
            'P36'     =>    [ 'Desc' => $this->Translate("(P36) Desuperheating setpoint for EEV automatic control mode"), 'HEXPos'=> 43, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 136, 'isVar' => true, 'Action' => false ],
            'P35'     =>    [ 'Desc' => $this->Translate("(P35) Superheating setpoint for EEV automatic control mode"), 'HEXPos'=> 44, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 135, 'isVar' => true, 'Action' => false ],
            'P41'     =>    [ 'Desc' => $this->Translate("(P41) AKP1 temperature threshold for EEV KP1 gain"), 'HEXPos'=> 45, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 141, 'isVar' => true, 'Action' => false ],
            'P42'     =>    [ 'Desc' => $this->Translate("(P42) AKP2 temperature threshold for EEV KP2 gain"), 'HEXPos'=> 46, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 142, 'isVar' => true, 'Action' => false ],
            'P43'     =>    [ 'Desc' => $this->Translate("(P43) AKP3 temperature threshold for EEV KP3 gain"), 'HEXPos'=> 47, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 143, 'isVar' => true, 'Action' => false ],
            'P44'     =>    [ 'Desc' => $this->Translate("(P44) EEV KP1 gain"), 'HEXPos'=> 48, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "", 'Pos' => 144, 'isVar' => true, 'Action' => false ],
            'P45'     =>    [ 'Desc' => $this->Translate("(P45) EEV KP2 gain"), 'HEXPos'=> 49, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "", 'Pos' => 145, 'isVar' => true, 'Action' => false ],
            'P46'     =>    [ 'Desc' => $this->Translate("(P46) EEV KP3 gain"), 'HEXPos'=> 50, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "", 'Pos' => 146, 'isVar' => true, 'Action' => false ],

            'P47'     =>    [ 'Desc' => $this->Translate("(P47) Maximum allowed inlet temperature for heat-pump working"), 'HEXPos'=> 60, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 147, 'isVar' => true, 'Action' => false ],
            'P48'     =>    [ 'Desc' => $this->Translate("(P48) Minimum allowed inlet temperature for heat-pump working"), 'HEXPos'=> 61, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 148, 'isVar' => true, 'Action' => false ],
            'P49'     =>    [ 'Desc' => $this->Translate("(P49) Threshold on inlet temperature for evaporator EC or AC with double speed blower speed setting"), 'HEXPos'=> 62, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 149, 'isVar' => true, 'Action' => false ],
            'P50'     =>    [ 'Desc' => $this->Translate("(P50) Antifreeze lower water temperature setpoint"), 'HEXPos'=> 63, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Temp", 'Pos' => 150, 'isVar' => true, 'Action' => false ],
            'P51'     =>    [ 'Desc' => $this->Translate("(P51) Evaporator EC blower higher speed setpoint"), 'HEXPos'=> 64, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "~Valve", 'Pos' => 151, 'isVar' => true, 'Action' => false ],
            'P52'     =>    [ 'Desc' => $this->Translate("(P52) Evaporator EC blower lower speed setpoint"), 'HEXPos'=> 65, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "~Valve", 'Pos' => 152, 'isVar' => true, 'Action' => false ],
            'P54'     =>    [ 'Desc' => $this->Translate("(P54) Low pressure switch bypass time"), 'HEXPos'=> 69, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "", 'Pos' => 169, 'isVar' => true, 'Action' => false ],

            'P11'     =>    [ 'Desc' => $this->Translate("(P11) Water temperature probe value shown on the display"), 'HEXPos'=> 2, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.P11", 'Pos' => 111, 'isVar' => true, 'Action' => false ],
            'P15'     =>    [ 'Desc' => $this->Translate("(P15) Type of safety flow switch for hot / solar water recirculation circuit, low pressure selection switch"), 'HEXPos'=> 2, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.P15", 'Pos' => 115, 'isVar' => true, 'Action' => false ],
            'P5'      =>    [ 'Desc' => $this->Translate("(P5) Defrosting mode"), 'HEXPos'=> 2, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.P5", 'Pos' => 105, 'isVar' => true, 'Action' => false ],
            'P6'      =>    [ 'Desc' => $this->Translate("(P6) Electrical heater usage during defrosting"), 'HEXPos'=> 2, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.P6", 'Pos' => 106, 'isVar' => true, 'Action' => false ],
            'P33'     =>    [ 'Desc' => $this->Translate("(P33) Electronic-expansion valve (EEV) control"), 'HEXPos'=> 2, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.P23", 'Pos' => 133, 'isVar' => true, 'Action' => false ],

            'P13'     =>    [ 'Desc' => $this->Translate("(P13) Hot-water recirculation pump working mode"), 'HEXPos'=> 1, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.P13", 'Pos' => 113, 'isVar' => true, 'Action' => false ],
            'P39'     =>    [ 'Desc' => $this->Translate("(P39) EEV control mode"), 'HEXPos'=> 1, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.P39", 'Pos' => 139, 'isVar' => true, 'Action' => false ],

            'Timer'     =>    [ 'Desc' => $this->Translate("(Timer) enabled"), 'HEXPos'=> 52, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Timer", 'Pos' => 152, 'isVar' => true, 'Action' => false ],
            'TStartH'     =>    [ 'Desc' => $this->Translate("(Timer) start hour"), 'HEXPos'=> 53, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.DurationH", 'Pos' => 153, 'isVar' => true, 'Action' => false ],
            'TStartM'     =>    [ 'Desc' => $this->Translate("(Timer) start minute"), 'HEXPos'=> 54, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Duration", 'Pos' => 154, 'isVar' => true, 'Action' => false ],
            'TStopH'     =>    [ 'Desc' => $this->Translate("(Timer) stop hour"), 'HEXPos'=> 55, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.DurationH", 'Pos' => 155, 'isVar' => true, 'Action' => false ],
            'TStopM'     =>    [ 'Desc' => $this->Translate("(Timer) stop minute"), 'HEXPos'=> 56, 'Type' => VARIABLETYPE_INTEGER, 'Profile' => "EKHHE.Duration", 'Pos' => 156, 'isVar' => true, 'Action' => false ],


            ]
    ];
    
