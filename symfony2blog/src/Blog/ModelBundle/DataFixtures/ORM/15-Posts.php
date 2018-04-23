<?php

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Post;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class Posts extends AbstractFixture implements OrderedFixtureInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function getOrder()
	{
		return 15;
	}

	/**
	 * {@inheritDoc}
	 */
	public function load(ObjectManager $manager)
	{
		$p1 = new Post();
		$p1->setTitle('Lorem ipsum dolor sit amet');
		$p1->setBody('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris maximus risus ac ex lobortis, quis tristique nulla commodo. Aenean nisi purus, rhoncus vel scelerisque ac, imperdiet sed sapien. Cras suscipit arcu id massa posuere aliquam. Aliquam erat volutpat. Integer est mi, pellentesque id maximus sed, consectetur vel orci. Proin tincidunt orci augue, ut sagittis urna porta vitae. Nam ac volutpat massa. In nec tincidunt risus. Nam ullamcorper est augue, ut efficitur risus condimentum eu. Nulla facilisi. Nam elit nibh, lobortis ac urna ac, aliquet laoreet nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.

Fusce malesuada, est ac viverra porta, elit metus faucibus diam, vitae laoreet purus massa eget nulla. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean commodo nisi nibh, et molestie ligula dictum non. Morbi fringilla mi vel risus faucibus volutpat. Nulla tempus dapibus nulla id tempus. Duis blandit erat eget porttitor faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse libero dolor, venenatis et lobortis non, finibus vitae ipsum.

Vestibulum sollicitudin ac lorem eget congue. Cras ultrices sagittis mauris, nec ultricies eros cursus et. Fusce sodales bibendum magna, a interdum tellus placerat ac. Praesent posuere quam non lectus tincidunt, eu egestas lorem tempus. Proin molestie quis sapien ac tempor. Sed efficitur, lectus eget bibendum euismod, enim turpis euismod erat, eu viverra enim eros vitae enim. Donec in mi accumsan, porttitor ipsum vestibulum, vulputate augue.

Suspendisse convallis pretium semper. Donec sed laoreet orci. Sed mollis mattis orci. Vivamus sed pretium lectus. Nullam metus felis, fringilla ut posuere vitae, ullamcorper vitae nunc. Etiam in nunc non enim eleifend laoreet quis non mi. Sed quis egestas libero, at suscipit ante. Sed efficitur magna sed arcu aliquam, nec finibus felis sodales. Praesent commodo dictum odio vel vulputate. Quisque congue odio sit amet libero feugiat, id egestas sem imperdiet.

Aliquam erat volutpat. Cras sit amet lacus sed tortor pellentesque posuere. Morbi fermentum faucibus tristique. Integer a venenatis neque, id rhoncus lorem. Vestibulum tempus euismod convallis. Maecenas a auctor nunc, nec pretium leo. Curabitur non mi tortor. Suspendisse feugiat lacinia vestibulum. Donec tristique urna quam, nec porttitor nisi scelerisque sit amet.');

		$p1->setAuthor($this->getAuthor($manager, 'David'));


        $p2 = new Post();
		$p2->setTitle('Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...');
		$p2->setBody('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque fermentum felis nunc, quis iaculis massa ultricies eu. Sed cursus commodo ultrices. Suspendisse vitae felis turpis. Quisque ac lobortis nibh. Aenean vel laoreet lorem. Morbi quis iaculis est. Aliquam volutpat erat sit amet ante scelerisque, ac pretium metus luctus.

Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse potenti. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sed pellentesque lectus. Sed at euismod diam. Quisque commodo euismod blandit. Suspendisse potenti. Phasellus interdum metus turpis, non ornare nunc tempus a. Vivamus varius maximus elit ac efficitur. Donec quam erat, iaculis in mi nec, feugiat tristique orci.

Mauris eu dapibus mi, at ultrices risus. Maecenas vel congue mi. Nulla varius odio ac nibh consequat hendrerit. Nullam ut tincidunt mauris, in aliquam nisi. Sed tempus ex ut arcu lobortis, at scelerisque ex malesuada. Nam pharetra auctor purus ut lacinia. Sed vitae vestibulum libero. Nulla congue consectetur bibendum. Donec diam mauris, dignissim id sem ut, blandit lacinia leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu turpis nec risus sollicitudin tristique nec non nisi. Curabitur sapien purus, porta quis tristique id, porta eget est.

Morbi diam dui, posuere eget posuere a, porttitor quis nulla. Sed efficitur diam et dui porttitor condimentum. Donec tincidunt nibh sed dui ornare, ac egestas turpis rhoncus. Aliquam mattis ante in placerat feugiat. Phasellus sit amet augue justo. Proin congue consequat orci eget gravida. Mauris quis volutpat ipsum. Quisque at risus ac metus semper pulvinar nec et ligula. Praesent id odio augue. Pellentesque maximus urna dictum, facilisis augue sed, eleifend quam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean eleifend enim leo, feugiat ornare nibh tempus et. Vivamus nec nibh in justo lobortis varius eget et ex. Donec feugiat a mi eu auctor. Aenean aliquet interdum hendrerit.

Nullam gravida dapibus massa. Vestibulum ut felis eu dui gravida lobortis. Nullam et tortor in dolor elementum aliquet non mattis erat. Nullam ac justo vehicula quam tempor condimentum. Integer ullamcorper porta sem sed mattis. Integer mattis gravida ligula, sed eleifend lorem malesuada tincidunt. Suspendisse dapibus luctus lorem quis fermentum. Cras sit amet condimentum purus, at vulputate erat. Quisque non lectus velit. Ut lobortis mattis ultricies. Aliquam tristique malesuada odio, eu blandit nulla dapibus vitae. Vestibulum quis pellentesque sem.');

		$p2->setAuthor($this->getAuthor($manager, 'Eddie'));


        $p3 = new Post();
		$p3->setTitle('Quisque eu imperdiet massa');
		$p3->setBody('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed velit non est feugiat congue ut ac nisl. Ut sit amet molestie lectus, vitae feugiat lacus. Vivamus hendrerit a sem in convallis. Mauris at placerat risus. Suspendisse lacinia mauris ligula. In vitae vulputate metus. Maecenas elementum orci non nulla iaculis consectetur. Nulla vitae justo ut magna tempor pellentesque quis aliquam ex. Sed blandit erat in purus lacinia, id rhoncus ipsum viverra. In mollis felis id pretium mattis. Proin luctus non massa nec facilisis. In convallis mattis tristique. Donec id rhoncus augue.

Nunc nunc enim, tempor quis tincidunt eget, fringilla et turpis. Duis nec sapien sit amet dui faucibus vehicula. Cras condimentum elementum lacinia. Donec auctor quam quis porttitor euismod. Integer malesuada arcu nec velit dignissim, nec luctus metus luctus. Phasellus tempor neque nunc, ac auctor dolor cursus id. Donec id accumsan neque. Aenean feugiat molestie ante. Etiam quis convallis arcu, sit amet blandit risus.

Maecenas luctus dolor sit amet suscipit congue. Integer scelerisque justo ac eleifend finibus. In finibus fringilla elit sed posuere. Phasellus mi sapien, facilisis vitae nunc at, efficitur feugiat arcu. Aenean purus leo, malesuada id sagittis eget, interdum non tellus. Nullam porta nibh eu nibh tristique, eu sodales nibh imperdiet. Quisque dapibus eu arcu vitae fermentum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi a neque quis nibh tempor sagittis ac efficitur arcu. In hac habitasse platea dictumst. Quisque tempus et metus ac venenatis. Sed sed laoreet ipsum, vitae accumsan ligula. Sed nibh arcu, sagittis eu faucibus vitae, mattis ac justo. Pellentesque in ante porta, lacinia arcu id, feugiat lorem.

Proin ut facilisis diam. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec mi metus, elementum ut fermentum quis, imperdiet id massa. Quisque semper lectus augue, sed faucibus sapien dictum in. Etiam mattis urna a mauris lacinia blandit. Nunc ipsum neque, euismod eu nulla vel, interdum finibus velit. Aliquam convallis ex nunc, eget porta mauris vehicula sodales. Vivamus et enim vel nunc vehicula blandit nec quis orci. Phasellus in eros nec nisl tristique auctor. Aliquam ut nisl non justo rutrum sodales ut sed tortor. Nam lorem dolor, tincidunt eu euismod a, ultricies ac elit.

Mauris euismod hendrerit nibh, vitae maximus est ultrices sed. Aenean vitae dictum turpis. In ac feugiat neque. Suspendisse scelerisque porttitor velit, porta congue ante. Sed tincidunt ut quam in posuere. Etiam gravida purus vitae laoreet varius. Nunc tempus euismod ipsum, et efficitur tortor tincidunt sit amet. Quisque eget posuere nisi. Vivamus quis libero pellentesque, tempus quam condimentum, semper dui. Integer dignissim dignissim lorem pulvinar molestie. Cras sit amet porttitor lectus. Praesent nec enim ut felis dignissim laoreet. Nam id blandit nunc. Phasellus pretium, odio et laoreet convallis, leo eros cursus nibh, et gravida ante ante sed velit. Vestibulum eros nisl, volutpat nec lobortis nec, posuere et elit.');

		$p3->setAuthor($this->getAuthor($manager, 'Eddie'));

        $manager->persist($p1);
        $manager->persist($p2);
        $manager->persist($p3);

        $manager->flush();
	}

    /**
     * Get an author
     * @param ObjectManager $manager
     * @param string $name
     * @return Author
     */
    private function getAuthor(ObjectManager $manager, $name)
    {
        return $manager->getRepository('ModelBundle:Author')->findOneBy(
            array(
                'name' => $name
            )
        );
    }
}

