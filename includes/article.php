<?php
  
   class Article
   {	
		public function fetch_contact_info()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM contact_info;");
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_admin_all()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM admin;");
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_admin_status($username)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT status FROM admin WHERE username = ? ;");
			$query -> bindValue(1,$username);
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_movie_article_all()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM movies order by movie_time_stamp DESC ;");
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_movie_article($movie_title)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM movies WHERE movie_title = ? ;");
			$query -> bindValue(1,$movie_title);
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_movie_article_count($movie_title)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT COUNT(*) AS article_count FROM comments WHERE article_title = ? ;");
			$query -> bindValue(1,$movie_title);
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_movie_article_view_count($movie_title)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT view_count FROM views WHERE article_title = ? ;");
			$query -> bindValue(1,$movie_title);
			$query->execute();
			return $query ->fetch();
		}
		/*-----------Movie ended------------*/
		public function fetch_political_article_all()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM political order by political_time_stamp DESC ;");
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_political_article_allby_rating()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM political order by political_time_stamp ASC ;");
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_movie_article_allby_rating()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM movies order by movie_time_stamp ASC ;");
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_political_article($political_title)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM political WHERE political_title = ? ;");
			$query -> bindValue(1,$political_title);
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_political_article_count($political_title)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT COUNT(*) AS article_count FROM comments WHERE article_title = ? ;");
			$query -> bindValue(1,$political_title);
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_political_article_view_count($political_title)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT view_count FROM views WHERE article_title = ? ;");
			$query -> bindValue(1,$political_title);
			$query->execute();
			return $query ->fetch();
		}
		/*-----------------------*/
		public function fetch_comments($movie_title)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM comments WHERE article_title = ? order by comment_time_stamp ASC ;");
			$query -> bindValue(1,$movie_title);
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_contactus()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM contactus ;");
			$query->execute();
			return $query ->fetchAll();
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		public function fetch_authornameid($author_name)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT author_id FROM author_names WHERE author_name = ? ;");
			$query -> bindValue(1,$author_name);
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_editioncheck($book_id,$author_id,$book_edition)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT COUNT(*) as value FROM book_details WHERE ( book_id = ? && author_id = ? && book_edition = ? ) ;");
			$query -> bindValue(1,$book_id);
			$query -> bindValue(2,$author_id);
			$query -> bindValue(3,$book_edition);
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_bookcover($b_cover)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT edition_image FROM edition_details WHERE b_cover = ? ;");
			$query -> bindValue(1,$b_cover);
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_edition_details()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM edition_details;");
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_only_edition_details($book_id, $author_id)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM edition_details WHERE book_id = ? and author_id = ? order by book_edition ASC;");
			$query -> bindValue(1,$book_id);
			$query -> bindValue(2,$author_id);
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_edition_details_by_bookid($book_id)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM edition_details WHERE book_id = ? ;");
			$query -> bindValue(1,$book_id);
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_edition_details_by_authorid($author_id)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM edition_details WHERE author_id = ? ;");
			$query -> bindValue(1,$author_id);
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_edition_details_by_bothids($book_id, $author_id)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM edition_details WHERE (book_id = ? && author_id = ?) ;");
			$query -> bindValue(1,$book_id);
			$query -> bindValue(2,$author_id);
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_edition_details_by_all($book_id, $author_id, $book_edition)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM edition_details WHERE (book_id = ? && author_id = ? && book_edition = ?) ;");
			$query -> bindValue(1,$book_id);
			$query -> bindValue(2,$author_id);
			$query -> bindValue(3,$book_edition);
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_bookname($book_id)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT book_name FROM book_names WHERE book_id = ? ;");
			$query -> bindValue(1,$book_id);
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_authorname($author_id)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT author_name FROM author_names WHERE author_id = ? ;");
			$query -> bindValue(1,$author_id);
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_book_details($book_id,$author_id,$book_edition)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT book_no,book_status FROM book_details WHERE book_id = ? && author_id = ? && book_edition = ? ;");
			$query -> bindValue(1,$book_id);
			$query -> bindValue(2,$author_id);
			$query -> bindValue(3,$book_edition);
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_booknameidsearch($book_name)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT book_id FROM book_names WHERE book_name LIKE '%$book_name%' ;");
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_authornameidsearch($author_name)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT author_id FROM author_names WHERE author_name LIKE '%$author_name%' ;");
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_search_bookname($search)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM book_details WHERE book_id LIKE '%$search%';");
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_search_authorname($search)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM book_details WHERE author_id LIKE '%$search%';");
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_search_both($book_id , $author_id)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM book_details WHERE book_id LIKE '$book_id' and author_id LIKE '$author_id';");
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_authorids($book_id)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM edition_details WHERE book_id = ? ;");
			$query -> bindValue(1,$book_id);
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_bookids($author_id)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM edition_details WHERE author_id = ? ;");
			$query -> bindValue(1,$author_id);
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_book_status($book_no)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT book_status FROM book_details WHERE book_no = ? ;");
			$query -> bindValue(1,$book_no);
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_student_status($roll_no, $password)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT student_status FROM student_names WHERE roll_no = ? and password = ? ;");
			$query -> bindValue(1,$roll_no);
			$query -> bindValue(2,$password);
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_student_state($roll_no)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT student_status FROM student_names WHERE roll_no = ?;");
			$query -> bindValue(1,$roll_no);
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_issued_returndate($book_no)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT return_date FROM issue_details WHERE book_no = ? and issue_status = ? ;");
			$query -> bindValue(1,$book_no);
			$query -> bindValue(2,0);
			$query->execute();
			return $query ->fetch();
		}
		public function fetch_issue_details($username)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM issue_details WHERE roll_no = ? ;");
			$query -> bindValue(1,$username);
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_issue_detail()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM issue_details WHERE issue_status = ? ;");
			$query -> bindValue(1,2);
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_issue_waiting()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM issue_details WHERE issue_status = ? ;");
			$query -> bindValue(1,2);
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_issue_return()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM issue_details WHERE issue_status = ? ;");
			$query -> bindValue(1,0);
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_student_names()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM student_names;");
			$query->execute();
			return $query ->fetchAll();
		}
		public function fetch_student_name($roll_no)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM student_names WHERE roll_no = ? ;");
			$query -> bindValue(1,$roll_no);
			$query->execute();
			return $query ->fetch();
		}
		/********************************/
		public function allgallery()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM gallery ORDER BY id DESC;");
			$query->execute();
			return $query ->fetchAll();
		}
		public function allgallerypicture($id)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM gallery_images WHERE gallery_id = ? LIMIT 1 ;");
			$query->bindValue(1,$id);
			$query->execute();
			return $query ->fetchAll();
		}
		public function singlephoto($id)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM gallery_images WHERE gallery_id = ? ORDER BY id DESC;");
			$query->bindValue(1,$id);
			$query->execute();
			return $query ->fetchAll();
		}
		
				public function allpolls()
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM polls ORDER BY id DESC;");
			$query->execute();
			return $query ->fetchAll();
		}
		public function allpollschoices($id)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM choices WHERE title_id = ? ;");
			$query->bindValue(1,$id);
			$query->execute();
			return $query ->fetchAll();
		}
		public function noofvotes($id)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM votes WHERE title_id = ?;");
			$query->bindValue(1,$id);
			$query->execute();
			return $query ->fetchAll();
		}
		public function allpollsvotes($id, $titleid)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM votes WHERE choice_id = ? AND title_id =?;");
			$query->bindValue(1,$id);
			$query->bindValue(2,$titleid);
			$query->execute();
			return $query ->fetchAll();
		}
		public function polltitle($id)
		{
			global $pdo;
			
			$query= $pdo->prepare("SELECT * FROM polls WHERE id = ?;");
			$query->bindValue(1,$id);
			$query->execute();
			return $query ->fetchAll();
		}
    }
 ?>