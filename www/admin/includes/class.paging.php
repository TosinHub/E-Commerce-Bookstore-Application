<?php

class paginate
{
	private $db;
	
	function __construct($conn)
	{
		$this->db = $conn;
	}
	
	public function dataview($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{

					$book_id = $row['book_id'];
	 			$title = $row['title'];
	 			$author = $row['author'];
	 			$cat_id = $row['cat_id'];
	 			$price = $row['price'];
	 			$year = $row['year'];
	 			$isbn = $row['isbn'];
	 			$image_path = $row['image_path'];

				?>


                 <tr><td><?php echo $title ?></td>
	 			 <td><?php echo $author ?> </td>
	 			 <td><?php echo $price ?></td>
	 			 <td><?php echo $year ?></td>
	 			 <td><?php echo $isbn ?></td>
	 			 <td><img src='<?php echo $image_path?>'  height='100px' width='100px' /></td>
	 			 <td><a href='edit_products.php?book_id=<?php echo $book_id ?>'>edit</a></td>
				 <td><a href='product.php?delete=<?php echo $book_id ?>'>delete</a></td></tr>




                <?php
			}





		}
		else
		{
			?>
            <tr>
            <td>No product posted yet</td>
            </tr>
            <?php
		}
		
	}
	
	public function paging($query,$products_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$products_per_page;
		}
		$query2=$query." limit $starting_position,$products_per_page";
		return $query2;
	}
	
	public function paginglink($query,$products_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		$total_no_of_products = $stmt->rowCount();
		
		if($total_no_of_products > 0)

		{
			
			$total_no_of_pages=ceil($total_no_of_products/$products_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<a href='".$self."?page_no=1'>First</a>&nbsp;&nbsp;";
				echo "<a href='".$self."?page_no=".$previous."'>Previous</a>&nbsp;&nbsp;";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<strong><a href='".$self."?page_no=".$i."' style='color:red;text-decoration:none'>".$i."</a></strong>&nbsp;&nbsp;";
				}
				else
				{
					echo "<a href='".$self."?page_no=".$i."'>".$i."</a>&nbsp;&nbsp;";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<a href='".$self."?page_no=".$next."'>Next</a>&nbsp;&nbsp;";
				echo "<a href='".$self."?page_no=".$total_no_of_pages."'>Last</a>&nbsp;&nbsp;";
			}

		}
	}
}