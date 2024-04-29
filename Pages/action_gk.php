<?php

// action.php

include('function.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'Add' || $_POST["action"] == 'Update')
	{
		$output = array();

		$player_name = $_POST["player_name"];
		$date = $_POST["date"];
		$nationality = $_POST["nationality"];
		$email = $_POST["email"];
		$injury_his = $_POST["injury_his"];
		$is_injured = $_POST["is_injured"];
		$height = $_POST["height"];
		$weight = $_POST["weight"];
		$diving = $_POST["diving"];
		$handling = $_POST["handling"];
		$kicking = $_POST["kicking"];
		$reflexes = $_POST["reflexes"];
		$speed = $_POST["speed"];
		$positioning = $_POST["positioning"];
		$com_skills = $_POST["com_skills"];
		$leader_skills = $_POST["leader_skills"];
		$pge = $_POST["pge"];
		$image_link = $_POST["img"];
		$src = $_POST["src"];
		$position = $_POST["position"];
		$playerNO = $_POST["playerNO"];



        if($player_name=="" || $date=="" || $nationality=="" || $email=="" || $is_injured=="" || $height=="" ||  $weight=="" || $diving=="" || $handling=="" || $kicking=="" || $reflexes=="" || $speed == "" || $positioning == "" || $com_skills == "" || $leader_skills == "" || $pge == "" || $image_link == "" || $src == "" || $position == "" || $playerNO == "")
        {
            if($player_name==""){
                $output["player_name_error"] = "Please fill the Player Name field...";
            }
            if($date==""){
                $output["date_error"] = "Please fill the BirthDay Date field...";
            }
            if($nationality==""){
                $output["nationality_error"] = "Please fill the Nationality field...";
            }
            if($email==""){
                $output["email_error"] = "Please fill the Email field...";
            }
            if($is_injured==""){
                $output["is_injury_error"] = "Please fill the Is Injury field...";
            }
			if($height==""){
                $output["height_error"] = "Please fill the Height field...";
            }
            if($weight==""){
                $output["weight_error"] = "Please fill the Weight field...";
            }
            if($diving==""){
                $output["diving_error"] = "Please fill the Diving field...";
            }
            if($handling==""){
                $output["handling_error"] = "Please fill the Handling field...";
            }
            if($kicking==""){
                $output["kicking_error"] = "Please fill the Kicking field...";
            }
            if($reflexes==""){
                $output["reflexes_error"] = "Please fill the Reflexes field...";
            }
            if($speed==""){
                $output["speed_error"] = "Please fill the Speed field...";
            }
            if($positioning==""){
                $output["positioning_error"] = "Please fill the Positioning field...";
            }
            if($com_skills==""){
                $output["com_skills_error"] = "Please fill the Communication Skills field...";
            }
            if($leader_skills==""){
                $output["leader_skills_error"] = "Please fill the Leader Ship Skills field...";
            }
            if($pge==""){
                $output["page_link_error"] = "Please fill the Page Link field...";
            }
            if($image_link==""){
                $output["image_link_error"] = "Please fill the Image Link field...";
            }
            if($src==""){
                $output["src_id_error"] = "Please fill the SRC ID field...";
            }
            if($position==""){
                $output["position_error"] = "Please fill the Position field...";
            }
            if($playerNO==""){
                $output["playerNO_error"] = "Please fill the Player Number field...";
            }

            echo json_encode($output);
        }

		else{
			$data = array(
				':player_name' => $player_name,
				':nationality' => $nationality,
				':date' => $date,
				':height' => $height,
				':weight' => $weight,
				':email' => $email,
				':injury_his' => $injury_his,
				':is_injured' => $is_injured,
				':diving' => $diving,
				':handling' => $handling,
				':reflexes' => $reflexes,
				':kicking' => $kicking,
				 ':speed' =>  $speed,
				':positioning' => $positioning,
				':com_skills' => $com_skills,
				':leader_skills' => $leader_skills,
				':pge' => $pge,
				':image_link' => $image_link,
				':src' => $src,
				':position' => $position,
				':playerNO' => $playerNO
			);
			
	
			if($_POST['action'] == 'Add')
			{
				$query = "INSERT INTO goalkeepers_table (PLAYERNAME, DATEOFBIRTH, NATIONALITY, EMAIL, INJURYHISTORY, ISINJURED, HEIGHT, WEIGHT,DIVING,HANDLING,KICKING,REFLEXES,SPEED,POSITIONING,COMMUNICATIONSKILLS,LEADERSHIPSKILLS,PAGELINK,IMAGELINK,SRCID,POSITION,PLAYERNUMBER) 
						  VALUES (:player_name, :date,:nationality,:email,:injury_his,:is_injured,:height,:weight,:diving,:handling,:kicking,:reflexes,:speed,:positioning,:com_skills,:leader_skills,:pge,:image_link,:src,:position,:playerNO)";
	
				$statement = $connect->prepare($query);
	
				if($statement->execute($data))
				{
					$output['success'] = '<div class="alert alert-success">New GoalKeeper Added</div>';
				}
	
				echo json_encode($output);
			}
	
			else if($_POST['action'] == 'Update')
			{
				$id=$_POST["customer_id"];

				$query = "UPDATE goalkeepers_table 
						  SET PLAYERNAME = :player_name,
                              DATEOFBIRTH = :date,
                              NATIONALITY =  :nationality,
                              EMAIL = :email,
                              INJURYHISTORY =  :injury_his,
                              ISINJURED = :is_injured,
                              HEIGHT = :height,
                              WEIGHT = :weight,
                              DIVING = :diving,
                              HANDLING =  :handling,
                              KICKING =  :kicking,
                              REFLEXES =  :reflexes,
                              SPEED =  :speed,
                              POSITIONING =  :positioning,
                              COMMUNICATIONSKILLS =  :com_skills,
                              LEADERSHIPSKILLS =  :leader_skills,
                              PAGELINK =  :pge,
                              IMAGELINK =  :image_link,
                              SRCID =  :src,
                              POSITION =  :position,
                              PLAYERNUMBER =  :playerNO
						  WHERE ID = '".$id."'";
	
				$statement = $connect->prepare($query);
	
				if($statement->execute($data))
				{
					$output['success'] = '<div class="alert alert-success">GoalKeeper Updated</div>';
				}
	
				echo json_encode($output);
			}
		}
	}

	if($_POST['action'] == 'fetch')
	{
		$id=$_POST["id"];

		$query = "SELECT * FROM goalkeepers_table WHERE ID = '".$_POST["id"]."'";

		$result = $connect->query($query);

		$data = array();

		foreach($result as $row)
		{
			$data['player_name'] = $row['PLAYERNAME'];
			$data['date'] = $row['DATEOFBIRTH'];
			$data['nationality'] = $row['NATIONALITY'];
			$data['email'] = $row['EMAIL'];
			$data['injury_his'] = $row['INJURYHISTORY'];
			$data['is_injured'] = $row['ISINJURED'];
			$data['height'] = $row['HEIGHT'];
            $data['weight'] = $row['WEIGHT'];
			$data['diving'] = $row['DIVING'];
			$data['handling'] = $row['HANDLING'];
			$data['kicking'] = $row['KICKING'];
			$data['reflexes'] = $row['REFLEXES'];
			$data['speed'] = $row['SPEED'];
			$data['positioning'] = $row['POSITIONING'];
			$data['com_skills'] = $row['COMMUNICATIONSKILLS'];
			$data['leader_skills'] = $row['LEADERSHIPSKILLS'];
			$data['pge'] = $row['PAGELINK'];
			$data['img'] = $row['IMAGELINK'];
            $data['src'] = $row['SRCID'];
			$data['position'] = $row['POSITION'];
			$data['playerNO'] = $row['PLAYERNUMBER'];

		}

		echo json_encode($data);
	}

	if($_POST['action'] == 'delete')
	{
        $id=$_POST["id"];

		$query = "DELETE FROM goalkeepers_table WHERE ID = '".$_POST["id"]."'";

		if($connect->query($query))
		{
			$output['success'] = '<div class="alert alert-success">GoalKeeper Deleted</div>';
		}

		echo json_encode($output);
	}
}



?>
