<?php

namespace App\Entity;

use App\Repository\MedicamentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: MedicamentRepository::class)]
class Medicament
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Nom est obligatoire")]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Veuiller choisir un type")]
    private ?string $Type = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:"Nb dose est obligatoire")]
    private ?int $Nb_dose = null;




    #[ORM\Column]
    #[Assert\NotBlank(message:"Prix est obligatoire")]
    private ?int $Prix = null;


    #[ORM\Column]
    private ?int $Stock = null;


    
    private $pharmacie;

    #[ORM\ManyToMany(targetEntity: Pharmacie::class, inversedBy: 'medicaments')]
    private Collection $id_pharmacie;

    #[ORM\OneToMany(mappedBy: 'medicament', targetEntity: OrdonnanceMedicament::class)]
    private Collection $ordonnanceMedicaments;

    public function __construct()
    {
        $this->id_pharmacie = new ArrayCollection();
        $this->ordonnances = new ArrayCollection();
        $this->ordonnanceMedicaments = new ArrayCollection();
    }
   

   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getNbDose(): ?int
    {
        return $this->Nb_dose;
    }

    public function setNbDose(int $Nb_dose): self
    {
        $this->Nb_dose = $Nb_dose;

        return $this;
    }
    public function getPrix(): ?int
    {
        return $this->Prix;
    }

    public function setPrix(int $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->Stock;
    }

    public function setStock(int $Stock): self
    {
        $this->Stock = $Stock;

        return $this;
    }

    /**
     * @return Collection<int, Pharmacie>
     */
    public function getIdPharmacie(): Collection
    {
        return $this->id_pharmacie;
    }

    public function addIdPharmacie(Pharmacie $idPharmacie): self
    {
        if (!$this->id_pharmacie->contains($idPharmacie)) {
            $this->id_pharmacie->add($idPharmacie);
        }

        return $this;
    }

    public function removeIdPharmacie(Pharmacie $idPharmacie): self
    {
        $this->id_pharmacie->removeElement($idPharmacie);

        return $this;
    }

    public function getOrdonnance(): ?Ordonnance
    {
        return $this->ordonnance;
    }

    public function setOrdonnance(?Ordonnance $ordonnance): self
    {
        $this->ordonnance = $ordonnance;

        return $this;
    }

    /**
     * @return Collection<int, OrdonnanceMedicament>
     */
    public function getOrdonnanceMedicaments(): Collection
    {
        return $this->ordonnanceMedicaments;
    }

    public function addOrdonnanceMedicament(OrdonnanceMedicament $ordonnanceMedicament): self
    {
        if (!$this->ordonnanceMedicaments->contains($ordonnanceMedicament)) {
            $this->ordonnanceMedicaments->add($ordonnanceMedicament);
            $ordonnanceMedicament->setMedicament($this);
        }

        return $this;
    }

    public function removeOrdonnanceMedicament(OrdonnanceMedicament $ordonnanceMedicament): self
    {
        if ($this->ordonnanceMedicaments->removeElement($ordonnanceMedicament)) {
            // set the owning side to null (unless already changed)
            if ($ordonnanceMedicament->getMedicament() === $this) {
                $ordonnanceMedicament->setMedicament(null);
            }
        }

        return $this;
    }

    public function __toString(): string {
        return $this->getNom();
    }
    
}
