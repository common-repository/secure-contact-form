<?class SecurityImage {
     var $oImage;
     var $iWidth;
     var $iHeight;
     var $iNumChars;
     var $iNumLines;
     var $iSpacing;
     var $sCode;
     
     function SecurityImage(
        $iWidth = 150,
        $iHeight = 30,
        $iNumChars = 5,
        $iNumLines = 30
     ) {
     	// get parameters
  	$this->iWidth = $iWidth;
  	$this->iHeight = $iHeight;
  	$this->iNumChars = $iNumChars;
  	$this->iNumLines = $iNumLines;
         
  	// create new image
	$this->oImage = imagecreate($iWidth, $iHeight);
         
  	// allocate white background colour
  	imagecolorallocate($this->oImage, 255, 255, 255);
         
  	// calculate spacing between characters based on width of image
  	$this->iSpacing = (int)($this->iWidth / $this->iNumChars);     
     }
     
     function DrawLines() {
     	for ($i = 0; $i < $this->iNumLines; $i++) {
      $iRandColour1 = rand(190, 250);
	$iRandColour2 = rand(190, 250);
	$iRandColour3 = rand(190, 250);
     $iLineColour = imagecolorallocate($this->oImage, $iRandColour1, $iRandColour2, $iRandColour3);
     imageline($this->oImage, rand(0, $this->iWidth), rand(0, $this->iHeight), rand(0, $this->iWidth), rand(0, $this->iHeight), $iLineColour);
  } 
     }

     function GenerateCode() {
     	 // reset code
  $this->sCode = '';
         
  // loop through and generate the code letter by letter
  for ($i = 0; $i < $this->iNumChars; $i++) {
     // select random character and add to code string
     do{
     $ascii=rand(48, 122);
     }while(($ascii>57 /*&& $ascii<65) || ($ascii>90*/ && $ascii<97));
     $this->sCode .= chr($ascii);
  } 
     }
     
     function DrawCharacters() {
     	// loop through and write out selected number of characters
  for ($i = 0; $i < strlen($this->sCode); $i++) {
     // select random font
     $iCurrentFont = rand(2, 7);
           
     // select random greyscale colour
     $iRandColour = rand(0, 64);
     $iTextColour = imagecolorallocate($this->oImage, $iRandColour, $iRandColour, $iRandColour);
           
     // write text to image
     imagestring($this->oImage, $iCurrentFont, $this->iSpacing / 3 + $i * $this->iSpacing, ($this->iHeight - imagefontheight($iCurrentFont)) / 2, $this->sCode[$i], $iTextColour);
  } 
     }
     
     function Create($generateCode = 1, $sFilename = '') {
     		// check for existence of GD GIF library
  if (!function_exists('imagegif')) {
     return false;
  }
         
  $this->DrawLines();
  if($generateCode)$this->GenerateCode();
  $this->DrawCharacters();
         
  // write out image to file or browser
  if ($sFilename != '') {
     // write stream to file
     imagegif($this->oImage, $sFilename);
  } else {
     // tell browser that data is gif
     header('Content-type: image/gif');
           
     // write stream to browser
     imagegif($this->oImage);
  }
         
  // free memory used in creating image
  imagedestroy($this->oImage);
         
  return true; 
     }
     
     function GetCode() {
     		return $this->sCode;
     }
  }?>