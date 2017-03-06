<?php

namespace SendinBlue\SendinBlueApiBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class TransactionMailDataModel
 *
 * @package SendinBlue\SendinBlueApiBundle\Model
 * @author  Lukáš Holeczy <info@lukasholeczy.eu>
 */
class TransactionMailDataModel
{
    /**
     * @var array
     *
     * @Assert\NotBlank(message="Recepient(s) cannot be empty.")
     * @Assert\Type(type="array", message="Recepient(s) must be in an array ('email' => 'name').")
     */
    private $to;

    /**
     * @var string
     * @Assert\Type(type="string", message="Subject must be a string.")
     */
    private $subject;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="Sender cannot be empty.")
     * @Assert\Type(type="string", message="Sender email must be a string.")
     */
    private $fromEmail;

    /**
     * @var string
     *
     * @Assert\Type(type="string", message="Sender name must be a string.")
     */
    private $fromName;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="HTML body of message cannot be empty.")
     * @Assert\Type(type="string", message="HTML body od message must be in a string.")
     */
    private $html;

    /**
     * @var string
     * @Assert\Type(type="string", message="Text body of message must be a string.")
     */
    private $text;

    /**
     * @var array
     * @Assert\Type(type="array", message="CC must be in an array ('email' => 'name').")
     */
    private $cc;

    /**
     * @var array
     * @Assert\Type(type="array", message="BCC must be in an array ('email' => 'name').")
     */
    private $bcc;

    /**
     * @var string
     * @Assert\Type(type="string", message="Reply to email must be a string.")
     */
    private $replyToEmail;

    /**
     * @var string
     * @Assert\Type(type="string", message="Reply to name must be a string.")
     */
    private $replyToName;

    /**
     * @var array
     * @Assert\Type(type="array", message="Attachment must be in an array.")
     */
    private $attachment;

    /**
     * @var array
     * @Assert\Type(type="array", message="Headers must be in an array.")
     */
    private $headers;

    /**
     * @var array
     * @Assert\Type(type="array", message="Inline image must be in an array.")
     */
    private $inlineImage;

    /**
     * @return array
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param array $to
     * @return $this
     */
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromEmail()
    {
        return $this->fromEmail;
    }

    /**
     * @param string $fromEmail
     * @return $this
     */
    public function setFromEmail($fromEmail)
    {
        $this->fromEmail = $fromEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromName()
    {
        return $this->fromName;
    }

    /**
     * @param $fromName
     * @return $this
     */
    public function setFromName($fromName)
    {
        $this->fromName = $fromName;

        return $this;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @param string $html
     * @return $this
     */
    public function setHtml($html)
    {
        $this->html = $html;

        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return array
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * @param array $cc
     * @return $this
     */
    public function setCc($cc)
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * @return array
     */
    public function getBcc()
    {
        return $this->bcc;
    }

    /**
     * @param array $bcc
     * @return $this
     */
    public function setBcc($bcc)
    {
        $this->bcc = $bcc;

        return $this;
    }

    /**
     * @return string
     */
    public function getReplyToEmail()
    {
        return $this->replyToEmail;
    }

    /**
     * @param string $replyToEmail
     * @return $this
     */
    public function setReplyToEmail($replyToEmail)
    {
        $this->replyToEmail = $replyToEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getReplyToName()
    {
        return $this->replyToName;
    }

    /**
     * @param string $replyToName
     * @return $this
     */
    public function setReplyToName($replyToName)
    {
        $this->replyToName = $replyToName;

        return $this;
    }

    /**
     * @return array
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * @param array $attachment
     * @return $this
     */
    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     * @return $this
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return array
     */
    public function getInlineImage()
    {
        return $this->inlineImage;
    }

    /**
     * @param array $inlineImage
     * @return $this
     */
    public function setInlineImage($inlineImage)
    {
        $this->inlineImage = $inlineImage;

        return $this;
    }

    public function toArray()
    {
        return array(
          'to' => $this->getTo(),
          'subject' => $this->getSubject(),
          'from' => [$this->getFromEmail(), $this->getFromName()],
          'html' => $this->getHtml(),
          'text' => $this->getText(),
          'cc' => $this->getCc(),
          'bcc' => $this->getBcc(),
          'replyto' => $this->getReplyTo(),
          'attachment' => $this->getAttachment(),
          'headers' => $this->getHeaders(),
          'inline_image' => $this->getInlineImage()
        );
    }
}
