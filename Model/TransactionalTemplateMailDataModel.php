<?php

namespace SendinBlue\SendinBlueApiBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class TransactionalTemplateMailDataModel
 *
 * @package SendinBlue\SendinBlueApiBundle\Model
 * @author  Lukáš Holeczy <info@lukasholeczy.eu>
 */
class TransactionalTemplateMailDataModel
{
    /**
     * @var int
     *
     * @Assert\NotBlank(message="Template ID cannot be empty")
     * @Assert\Type(type="integer", message="Template ID must be an int.")
     */
    private $id;

    /**
     * @var array
     *
     * @Assert\NotBlank(message="Recipient cannot be empty")
     */
    private $to = [];

    /**
     * @var string
     *
     * @Assert\Type(type="string", message="CC must be a string.")
     */
    private $cc;

    /**
     * @var string
     *
     * @Assert\Type(type="string", message="BCC must be a string.")
     */
    private $bcc;

    /**
     * @var string
     *
     * @Assert\Type(type="string", message="Reply to must be a string.")
     */
    private $replyTo;

    /**
     * @var array
     *
     * @Assert\Type(type="array", message="Attributes must be in an array ('ATTR_NAME' => 'ATTR_VALUE').")
     */
    private $attr;

    /**
     * @var string
     *
     * @Assert\Type(type="string", message="Attachment url to must be a string.")
     */
    private $attachmentUrl;

    /**
     * @var array
     *
     * @Assert\Type(type="array", message="Attachment must be in an array ('FILE_NAME' => 'FILE_BASE64_ENCODED_DATA').")
     */
    private $attachment;

    /**
     * @var array
     *
     * @Assert\Type(type="array", message="Headers must be in an array ('PARAMETER' => 'VALUE').")
     */
    private $headers;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return array
     */
    public function getTo()
    {
        return $this->to;
    }

    public function addTo($to)
    {
        $this->to[] = $to;

        return $this;
    }

    /**
     * @return string
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * @param string $cc
     * @return $this
     */
    public function setCc($cc)
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * @return string
     */
    public function getBcc()
    {
        return $this->bcc;
    }

    /**
     * @param string $bcc
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
    public function getReplyTo()
    {
        return $this->replyTo;
    }

    /**
     * @param string $replyTo
     * @return $this
     */
    public function setReplyTo($replyTo)
    {
        $this->replyTo = $replyTo;

        return $this;
    }

    /**
     * @return array
     */
    public function getAttr()
    {
        return $this->attr;
    }

    /**
     * @param array $attr
     * @return $this
     */
    public function setAttr($attr)
    {
        $this->attr = $attr;

        return $this;
    }

    /**
     * @return string
     */
    public function getAttachmentUrl()
    {
        return $this->attachmentUrl;
    }

    /**
     * @param string $attachmentUrl
     * @return $this
     */
    public function setAttachmentUrl($attachmentUrl)
    {
        $this->attachmentUrl = $attachmentUrl;

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

    public function toArray()
    {
        return array(
          'to' => implode('|', $this->getTo()),
          'cc' => $this->getCc(),
          'bcc' => $this->getBcc(),
          'replyto' => $this->getReplyTo(),
          'attr' => $this->getAttr(),
          'attachment_url' => $this->getAttachmentUrl(),
          'attachment' => $this->getAttachment(),
          'headers' => $this->getHeaders(),
        );
    }
}
