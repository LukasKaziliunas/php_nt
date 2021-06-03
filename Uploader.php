<?php

class Uploader
{

  private $fileName;
  private $fileTmpName;
  private $fileSize;
  private $fileError;
  private $fileType;

  private $allowed = array('jpg', 'jpeg', 'png');

  private $error = "";

  private $fileNameNew;
  private $fileDestination;

  function __construct($file)
  {
    $this->fileName = $file['name'];
    $this->fileTmpName = $file['tmp_name'];
    $this->fileSize = $file['size'];
    $this->fileError = $file['error'];
    $this->fileType = $file['type'];



  }

  //patikrina ar failas tinkamas ir sudaro klaidu pradesimus, jei viskas gerai -> return true else return false
  function validate()
  {
    $fileExt = explode('.', $this->fileName);
    $fileActualExt = strtolower(end($fileExt));


    if (in_array($fileActualExt, $this->allowed)) {
      if ($this->fileError === 0) {
        if ($this->fileSize < 5000000) {
          $this->fileNameNew = uniqid('', true) . "." . $fileActualExt;
          $this->fileDestination = 'objects/pictures/' . $this->fileNameNew;
          return true;
        } else {
          $this->error = "failas per didelis";
          return false;
        }
      } else {
        $this->error = "ivyko klaida ikeliant nuotrauką";
        return false;
      }
    } else {
      $this->error = "nuotraukos formatas netinkamas arba nepasirinkta jokia nuotrauka";
      return false;
    }
  }

  //perkelia faila is laikino aplanko i nurodyta aplanka
  function move_file()
  {
    if ($this->validate()) {
      move_uploaded_file($this->fileTmpName, $this->fileDestination);
       //jei pavyko validuoti ir perkelti grazinama true
       return true;
    } else {
      return false; // jei grazinta false ziureti $error
    }
  }

  function GetErrorMsg()
  {
    return $this->error;
  }

  function getFileName()
  {
    return $this->fileNameNew;
  }
}
