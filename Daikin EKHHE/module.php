<?php

declare(strict_types=1);

	class DaikinEKHHE extends IPSModule
	{

		public function Create()
		{
			//Never delete this line!
			parent::Create();

			//$this->RequireParent('{3CFF0FD9-E306-41DB-9B5A-9D06D38576C3}');	
			$this->RequireParent('{8062CF2B-600E-41D6-AD4B-1BA66C32D6ED}');
			$this->createProfile();
		}

		public function Destroy()
		{
			//Never delete this line!
			parent::Destroy();
		}

		public function ApplyChanges()
		{
			//Never delete this line!
			parent::ApplyChanges();
		}

		public function SendData(string $Data) {
			$this->SendDataToParent(json_encode([
				'DataID' => "{79827379-F36E-4ADA-8A95-5F8D1DC92FA9}",
				//'Buffer' => utf8_encode($Data),
				 'Buffer' => mb_convert_encoding($Data, 'UTF-8', 'ISO-8859-1'),
			]));
		}

		public function ReceiveData($JSONString)
		{
			$data = json_decode($JSONString);
			$header = $this->GetBuffer('Buffer');
			$RAWDATA = $header . strtoupper(bin2hex(utf8_decode($data->Buffer))); 

			$this->SendDebug(__FUNCTION__, 'receive RAW Data: ' .json_encode($RAWDATA), 0);
			
			if(strlen($RAWDATA) > 1000)
			{
				$this->SendDebug(__FUNCTION__, 'Buffer to big, delete it and start again', 0);
				$RAWDATA = "";
				$this->SetBuffer('Buffer',"");
			}

			$this->checkDatastring($RAWDATA);	
		}

		private function ReadTelegram(string $HEX)
		{
			require __DIR__ . '/../libs/datapoints.php';
			$this->SendDebug(__FUNCTION__, 'Read Telegram ' . $HEX, 0);
			$HEX = json_decode($HEX, true);
			$Param = $HEX[0];

			if (!@$DP[$Param]){return;}

			foreach($DP[$Param] as $key => $value)
			{	
				$HexValue = $HEX[($value['HEXPos'])];
				$ConvertValue = hexdec($HexValue);
				$this->SendDebug(__FUNCTION__, 'reading Parameter '.$key." with HEX ".$HexValue." and converted value: ".$ConvertValue, 0);
				
				switch ($key)
				{
					case 'DIG': # Digital input, reversed bit
					if ((!@$this->GetIDForIdent($Param."_DIG1")) OR (!@$this->GetIDForIdent($Param."_DIG2")) OR (!@$this->GetIDForIdent($Param."_DIG3")))
					{
						$this->MaintainVariable($Param."_DIG1",$this->Translate("Digital 1"), VARIABLETYPE_BOOLEAN, '~Switch',0,true);
						$this->MaintainVariable($Param."_DIG2",$this->Translate("Digital 2"), VARIABLETYPE_BOOLEAN, '~Switch',0,true);
						$this->MaintainVariable($Param."_DIG3",$this->Translate("Digital 3"), VARIABLETYPE_BOOLEAN, '~Switch',0,true);
					}

						switch($ConvertValue)
						{
							case 7:
								$this->SetValue($Param."_DIG1",false); # 1
								$this->SetValue($Param."_DIG2",false); # 1
								$this->SetValue($Param."_DIG3",false); # 1
							break;
							
							case 6:
								$this->SetValue($Param."_DIG1",true);  # 0
								$this->SetValue($Param."_DIG2",false); # 1
								$this->SetValue($Param."_DIG3",false); # 1	
							break;
							
							case 5:
								$this->SetValue($Param."_DIG1",false); # 1
								$this->SetValue($Param."_DIG2",true);  # 0
								$this->SetValue($Param."_DIG3",false); # 1
							break;

							case 4:
								$this->SetValue($Param."_DIG1",true);  # 0 
								$this->SetValue($Param."_DIG2",true);  # 0
								$this->SetValue($Param."_DIG3",false); # 1
							break;

							case 3:
								$this->SetValue($Param."_DIG1",false); # 1
								$this->SetValue($Param."_DIG2",false); # 1
								$this->SetValue($Param."_DIG3",true);  # 0
							break;
							
							case 2:
								$this->SetValue($Param."_DIG1",true);  # 0
								$this->SetValue($Param."_DIG2",false); # 1
								$this->SetValue($Param."_DIG3",true);  # 0
							break;
						
							case 1:	
								$this->SetValue($Param."_DIG1",false); # 1
								$this->SetValue($Param."_DIG2",true);  # 0
								$this->SetValue($Param."_DIG3",true);  # 0
							break;
							
							case 0:
								$this->SetValue($Param."_DIG1",true);  # 0
								$this->SetValue($Param."_DIG2",true);  # 0
								$this->SetValue($Param."_DIG3",true);  # 0
							break;
						}
					break;
					default:
					
					if((!@$this->GetIDForIdent($Param."_".$key)) AND $value['isVar'])
					{
						$this->MaintainVariable($Param."_".$key,$value['Desc'], $value['Type'], $value['Profile'], $value['Pos'],true);

						if($value['Action'])
						{
							$this->EnableAction($Param."_".$key);
						}
					}

					$this->SendDebug(__FUNCTION__, 'write Ident '.$Param."_".$key."with value: ".$ConvertValue, 0);

					$this->SetValue($Param."_".$key,$ConvertValue);
				}
			}
		}
					
		private function createProfile()
		{
			if (!IPS_VariableProfileExists('EKHHE.Temp')) {
				IPS_CreateVariableProfile('EKHHE.Temp', VARIABLETYPE_INTEGER);
				IPS_SetVariableProfileIcon('EKHHE.Temp', 'Temperature');
				IPS_SetVariableProfileValues("EKHHE.Temp", -50, 85, 1);
				IPS_SetVariableProfileText("EKHHE.Temp", "", " °C");
				IPS_SetVariableProfileAssociation("EKHHE.Temp",206,'-50', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",207,'-49', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",208,'-48', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",209,'-47', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",210,'-46', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",211,'-45', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",212,'-44', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",213,'-43', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",214,'-42', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",215,'-41', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",216,'-40', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",217,'-39', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",218,'-38', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",219,'-37', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",220,'-36', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",221,'-35', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",222,'-34', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",223,'-33', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",224,'-32', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",225,'-31', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",226,'-30', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",227,'-29', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",228,'-28', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",229,'-27', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",230,'-26', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",231,'-25', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",232,'-24', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",233,'-23', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",234,'-22', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",235,'-21', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",236,'-20', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",237,'-19', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",238,'-18', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",239,'-17', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",240,'-16', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",241,'-15', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",242,'-14', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",243,'-13', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",244,'-12', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",245,'-11', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",246,'-10', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",247,'-9', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",248,'-8', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",249,'-7', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",250,'-6', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",251,'-5', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",252,'-4', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",253,'-3', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",254,'-2', "", 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation("EKHHE.Temp",255,'-1', "", 0xFFFFFFFF);
				

			}
			if (!IPS_VariableProfileExists('EKHHE.SetTemp')) {
				IPS_CreateVariableProfile('EKHHE.SetTemp', VARIABLETYPE_INTEGER);
				IPS_SetVariableProfileIcon('EKHHE.SetTemp', 'Temperature');
				IPS_SetVariableProfileValues("EKHHE.SetTemp", 40, 65, 1);
				IPS_SetVariableProfileText("EKHHE.SetTemp", "", " °C");
			}
			if (!IPS_VariableProfileExists('EKHHE.Mode')) {
				IPS_CreateVariableProfile('EKHHE.Mode', VARIABLETYPE_INTEGER);
				IPS_SetVariableProfileIcon('EKHHE.Mode', '');
				IPS_SetVariableProfileValues("EKHHE.Mode", 0, 5, 1);
				IPS_SetVariableProfileText("EKHHE.Mode", "", "");
				IPS_SetVariableProfileAssociation('EKHHE.Mode', 0, $this->Translate('auto'), '', 0xFFFF00);
				IPS_SetVariableProfileAssociation('EKHHE.Mode', 1, $this->Translate('eco'), '', 0x00FF00);
				IPS_SetVariableProfileAssociation('EKHHE.Mode', 2, $this->Translate('boost'), '', 0x000000);
				IPS_SetVariableProfileAssociation('EKHHE.Mode', 3, $this->Translate('electric'), '', 0x0000FF);
				IPS_SetVariableProfileAssociation('EKHHE.Mode', 4, $this->Translate('fan'), '', 0x00);
				IPS_SetVariableProfileAssociation('EKHHE.Mode', 5, $this->Translate('holiday'), '', 0xFF00FF);
			}

			if (!IPS_VariableProfileExists('EKHHE.Duration')) {
				IPS_CreateVariableProfile('EKHHE.Duration', VARIABLETYPE_INTEGER);
				IPS_SetVariableProfileIcon('EKHHE.Duration', 'clock');
				IPS_SetVariableProfileValues("EKHHE.Duration", 0, 90, 1);
				IPS_SetVariableProfileText("EKHHE.Duration", "", " Min.");
			}

			if (!IPS_VariableProfileExists('EKHHE.DurationS')) {
				IPS_CreateVariableProfile('EKHHE.DurationS', VARIABLETYPE_INTEGER);
				IPS_SetVariableProfileIcon('EKHHE.DurationS', 'clock');
				IPS_SetVariableProfileValues("EKHHE.DurationS", 0, 90, 1);
				IPS_SetVariableProfileText("EKHHE.DurationS", "", " sek.");
			}

			if (!IPS_VariableProfileExists('EKHHE.DurationH')) {
				IPS_CreateVariableProfile('EKHHE.DurationH', VARIABLETYPE_INTEGER);
				IPS_SetVariableProfileIcon('EKHHE.DurationH', 'clock');
				IPS_SetVariableProfileValues("EKHHE.DurationH", 0, 24, 1);
				IPS_SetVariableProfileText("EKHHE.DurationH", "", " Std.");
			}
			if (!IPS_VariableProfileExists('EKHHE.P11')) {
				IPS_CreateVariableProfile('EKHHE.P11', VARIABLETYPE_INTEGER);
				IPS_SetVariableProfileIcon('EKHHE.P11', '');
				IPS_SetVariableProfileValues("EKHHE.P11", 0, 1, 1);
				IPS_SetVariableProfileText("EKHHE.P11", "", "");
				IPS_SetVariableProfileAssociation('EKHHE.P11', 0, $this->Translate('lower'), '', 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation('EKHHE.P11', 1, $this->Translate('upper'), '', 0x00FF00);
			}
			if (!IPS_VariableProfileExists('EKHHE.P12')) {
				IPS_CreateVariableProfile('EKHHE.P12', VARIABLETYPE_INTEGER);
				IPS_SetVariableProfileIcon('EKHHE.P12', '');
				IPS_SetVariableProfileValues("EKHHE.P12", 0, 2, 1);
				IPS_SetVariableProfileText("EKHHE.P12", "", "");
				IPS_SetVariableProfileAssociation('EKHHE.P12', 0, $this->Translate('always OFF'), '', 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation('EKHHE.P12', 1, $this->Translate('hot-water recirculation'), '', 0x00FF00);
				IPS_SetVariableProfileAssociation('EKHHE.P12', 2, $this->Translate('Thermal solar system'), '', 0x00FF00);
			}
			if (!IPS_VariableProfileExists('EKHHE.P13')) {
				IPS_CreateVariableProfile('EKHHE.P13', VARIABLETYPE_INTEGER);
				IPS_SetVariableProfileIcon('EKHHE.P13', '');
				IPS_SetVariableProfileValues("EKHHE.P13", 0, 1, 1);
				IPS_SetVariableProfileText("EKHHE.P13", "", "");
				IPS_SetVariableProfileAssociation('EKHHE.P13', 0, $this->Translate('with heat-pump'), '', 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation('EKHHE.P13', 1, $this->Translate('always ON'), '', 0x00FF00);
			}
			if (!IPS_VariableProfileExists('EKHHE.P14')) {
				IPS_CreateVariableProfile('EKHHE.P14', VARIABLETYPE_INTEGER);
				IPS_SetVariableProfileIcon('EKHHE.P14', '');
				IPS_SetVariableProfileValues("EKHHE.P14", 0, 3, 1);
				IPS_SetVariableProfileText("EKHHE.P14", "", "");
				IPS_SetVariableProfileAssociation('EKHHE.P14', 0, $this->Translate('EC'), '', 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation('EKHHE.P14', 1, $this->Translate('AC'), '', 0x00FF00);
				IPS_SetVariableProfileAssociation('EKHHE.P14', 2, $this->Translate('AC with double speed'), '', 0x00FF00);
				IPS_SetVariableProfileAssociation('EKHHE.P14', 3, $this->Translate('EC with dynamic speed control'), '', 0x00FF00);
			}
			if (!IPS_VariableProfileExists('EKHHE.P15')) {
				IPS_CreateVariableProfile('EKHHE.P15', VARIABLETYPE_INTEGER);
				IPS_SetVariableProfileIcon('EKHHE.P15', '');
				IPS_SetVariableProfileValues("EKHHE.P15", 0, 3, 1);
				IPS_SetVariableProfileText("EKHHE.P15", "", "");
				IPS_SetVariableProfileAssociation('EKHHE.P15', 0, $this->Translate('NC'), '', 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation('EKHHE.P15', 1, $this->Translate('NO'), '', 0x00FF00);
				IPS_SetVariableProfileAssociation('EKHHE.P15', 2, $this->Translate('low pressure selection switch'), '', 0x00FF00);
			}
			if (!IPS_VariableProfileExists('EKHHE.P16')) {
				IPS_CreateVariableProfile('EKHHE.P16', VARIABLETYPE_INTEGER);
				IPS_SetVariableProfileIcon('EKHHE.P16', '');
				IPS_SetVariableProfileValues("EKHHE.P16", 0, 2, 1);
				IPS_SetVariableProfileText("EKHHE.P16", "", "");
				IPS_SetVariableProfileAssociation('EKHHE.P16', 0, $this->Translate('permanently deactivated'), '', 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation('EKHHE.P16', 1, $this->Translate('working with DIG1'), '', 0x00FF00);
				IPS_SetVariableProfileAssociation('EKHHE.P16', 2, $this->Translate('Direct control of thermal solar'), '', 0x00FF00);
			}
			if (!IPS_VariableProfileExists('EKHHE.P24')) {
				IPS_CreateVariableProfile('EKHHE.P24', VARIABLETYPE_INTEGER);
				IPS_SetVariableProfileIcon('EKHHE.P24', '');
				IPS_SetVariableProfileValues("EKHHE.P24", 0, 2, 1);
				IPS_SetVariableProfileText("EKHHE.P24", "", "");
				IPS_SetVariableProfileAssociation('EKHHE.P24', 0, $this->Translate('permanently deactivated'), '', 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation('EKHHE.P24', 1, $this->Translate('activated with ECO'), '', 0x00FF00);
				IPS_SetVariableProfileAssociation('EKHHE.P24', 2, $this->Translate('activated with AUTO'), '', 0xFFFF00);
			}			
			if (!IPS_VariableProfileExists('EKHHE.P23')) {
				IPS_CreateVariableProfile('EKHHE.P23', VARIABLETYPE_INTEGER);
				IPS_SetVariableProfileIcon('EKHHE.P23', '');
				IPS_SetVariableProfileValues("EKHHE.P23", 0, 1, 1);
				IPS_SetVariableProfileText("EKHHE.P23", "", "");
				IPS_SetVariableProfileAssociation('EKHHE.P23', 0, $this->Translate('permanently deactivated'), '', 0xFFFFFFFF);
				IPS_SetVariableProfileAssociation('EKHHE.P23', 1, $this->Translate('activated'), '', 0x00FF00);
			}
		}

		public function RequestAction($Ident, $Value)
		{
			require __DIR__ . '/../libs/datapoints.php';

			$this->SendDebug(__FUNCTION__, "starting action: ". $Ident . " with value ".$Value, 0);
			$IdentPart = explode("_",$Ident);

			switch ($Ident) {
				case 'CC_SetTemp':
					$this->SetValue($Ident, $Value);
					$Prep = $this->prepareSend($DP[($IdentPart[0])][($IdentPart[1])]['HEXPos'],$Value);
					// just my backup. Note: we can create a backup and restore function..
					//$Prep = "cd0115001e3c0a0007111efb0332323737323e3e070441070202000000030001010a280a8c3e4b1e0f09195804ff00000202010000000000000f27202bf9190c5a321400017fc0";
					
				break;
				case 'CC_Power':
					if($Value){$Value = 1;}else{$Value = 0;}
					$this->SetValue($Ident, $Value);
					$Prep = $this->prepareSend($DP[($IdentPart[0])][($IdentPart[1])]['HEXPos'],$Value);
				break;
				case 'CC_Mode':
					$this->SetValue($Ident, $Value);
					$Prep = $this->prepareSend($DP[($IdentPart[0])][($IdentPart[1])]['HEXPos'],$Value);
				break;
				
			}
			$TELEGRAM = pack("H*",$Prep);
			IPS_LogMessage('Daikin EKHHE IDENT:',$Ident);
			IPS_LogMessage('Daikin EKHHE:',$Prep);
			//$this->SendData($TELEGRAM);
		}

		private function prepareSend($parameter, $value)
		{
			$this->SendDebug(__FUNCTION__, "prepare Data to write: ". $value, 0);
			$value = str_pad((dechex($value)),2,"0", STR_PAD_LEFT);

			// we have the Paramter without the starthex, thats why we go 1 array back
			$ParArray = $parameter-1;
			// read the buffer
			$lastParam = $this->GetBuffer('lastConfigParameter');
			// making an array
			$HEX = explode(" ", wordwrap($lastParam, 2, " ", true));

			$NewParam = "";

			foreach ($HEX as $key=>$val)
			{
				//write new param
				if($key === $ParArray)
				{
					$val = $value;
					IPS_LogMessage('Daikin EKHHE prepare:',$key." ".$value."-".$ParArray);

				}
				$NewParam .= $val;

			}
			$HexStart = "CD";
			$Checksum = $this->CalculateChecksum($HexStart.$NewParam);
			return $HexStart.$NewParam.$Checksum;
		}

		private function CalculateChecksum(string $hex)
		{
			$bufLen = strlen($hex);
			$sum_dec = 170; // Hex AA
			for ($i=0; $i < $bufLen; $i+=2)
			{
				//echo substr($hex, $i, 2);
				$sum_dec += hexdec(substr($hex, $i, 2));
			}

			$result = strtoupper(dechex(($sum_dec % 256)));
			$this->SendDebug(__FUNCTION__, 'Calculate checksum for HEX: '.$hex." with result ". $result, 0);

			return str_pad($result,2,"0", STR_PAD_LEFT);
		}


		private function checksum(string $hex)
		{  
			$GivenHex = (substr($hex, 0, 2));
			$result = false;

			switch($GivenHex)
			{
				case 'DD':
					$neededHex = 'DD';
					$expectedLength = 82-2;
				break;
				case 'CC':
					$neededHex = 'CC';
					$expectedLength = 142-2;
				break;
				default:
					$this->SendDebug(__FUNCTION__, 'Hex '.$GivenHex.' is unwanted', 0);
					return $result;

			} 

			$this->SendDebug(__FUNCTION__, 'needed Hex '.$neededHex.' received', 0);

			$calculateChecksum = substr($hex, 0, $expectedLength);
			$givenChecksum = substr($hex, $expectedLength, 2);
			$checksum = $this->CalculateChecksum($calculateChecksum);

			if($checksum = $givenChecksum)
			{
				$this->SendDebug(__FUNCTION__, 'checksum for Hex '.$GivenHex .' is ok', 0);
				$result = true;
			}
			else
			{
				$this->SendDebug(__FUNCTION__, 'checksum for Hex '.$GivenHex .' is not ok', 0);
				$result = false;
			}
		
			return $result;
		}

		private function checkDatastring($RAWDATA)
		{			
			$GivenHex = (substr($RAWDATA, 0, 2));
			$this->SendDebug(__FUNCTION__, 'starting checking data in Buffer for Hex: '.$GivenHex, 0);

			switch($GivenHex)
			{
				case 'DD':
					$neededHex = 'DD';
					$expectedLength = 82-2;
				break;
				case 'CC':
					$neededHex = 'CC';
					$expectedLength = 142-2;
				break;
				default:
					$this->SetBuffer('Buffer',"");
					$RAWDATA = "";
					$this->SendDebug(__FUNCTION__, 'unwanted Data in Buffer, remove Hex: '.$GivenHex, 0);

				return;
			}
			
			$this->SetBuffer('Buffer',$RAWDATA);
			$this->SendDebug(__FUNCTION__, 'data '.json_encode($RAWDATA), 0);
			
			if ($this->checksum($RAWDATA))
			{
				if ($GivenHex == 'CC')
				{
					// write CC Parameter to an extra Buffer, without CC and without checksum
					$Param = substr($RAWDATA, 2, 138);
					$this->SendDebug(__FUNCTION__, 'write some CC Parameter to an extra buffer. '.$Param, 0);
					$this->SetBuffer('lastConfigParameter',$Param);
				}
				$HEX = json_encode(explode(" ", wordwrap($RAWDATA, 2, " ", true)));
				$this->SendDebug(__FUNCTION__, 'data ok, lets go to work... '.json_encode($RAWDATA), 0);
				$this->ReadTelegram($HEX);
				$this->SetBuffer('Buffer',"");
			}
			else
			{
				$this->SetBuffer('Buffer',$RAWDATA);
				$this->SendDebug(__FUNCTION__, 'data not complete, collect more '.json_encode($RAWDATA), 0);
			}
		}		
}