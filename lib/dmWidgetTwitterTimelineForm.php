<?php

class dmWidgetTwitterTimelineForm extends dmWidgetPluginForm
{
  public function configure()
  {
    $this->widgetSchema['user'] = new sfWidgetFormInputText();
    $this->validatorSchema['user'] = new sfValidatorString(array(
      'required' => true,
      'min_length' => 3
    ));

    $this->widgetSchema['nb_tweets'] = new sfWidgetFormInputText();
    $this->validatorSchema['nb_tweets'] = new sfValidatorInteger(array(
      'min' => 0,
      'max' => 200
    ));

    $this->widgetSchema['life_time'] = new sfWidgetFormInputText();
    $this->validatorSchema['life_time'] = new sfValidatorInteger(array(
      'min' => 0
    ));
    $this->widgetSchema->setHelp('life_time', 'Cache life time in seconds');

    $this->widgetSchema['show_profile_image'] = new sfWidgetFormInputCheckbox();
    $this->validatorSchema['show_profile_image'] = new sfValidatorBoolean();
    $this->widgetSchema->setHelp('show_profile_image', 'Show the author profile image');

    $this->widgetSchema['as_background'] = new sfWidgetFormInputCheckbox();
    $this->validatorSchema['as_background'] = new sfValidatorBoolean();

    if(!$this->getDefault('nb_tweets'))
    {
      $this->setDefault('nb_tweets', 10);
    }

    if(!$this->getDefault('life_time'))
    {
      $this->setDefault('life_time', 3600);
    }
    
    parent::configure();
  }
}