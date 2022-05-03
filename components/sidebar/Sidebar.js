import { useState } from "react";
import { Avatar, IconButton, Button } from "@mui/material";
import styled from "styled-components";
import ChatIcon from "@mui/icons-material/Chat";
import MoreVertIcon from "@mui/icons-material/MoreVert";
import SearchIcon from "@mui/icons-material/Search";
import * as EmailValidator from "email-validator";

function Sidebar(props) {
  const [newChat, setNewChat] = useState(false);
  const [userEmail, setUserEmail] = useState("");

  const createChat = () => {
    console.log("createChat");
    setNewChat(true);
  };
  const startNewChat = (event) => {
    event.preventDefault();
    if (EmailValidator.validate(userEmail)) {
      console.log("valid email");
      setNewChat(false);
    } else{
      alert("Please enter valid email");
    }
    //console.log(userEmail);
    
  };
  const getUserEmail = (event) => {
    event.preventDefault();
    setUserEmail(event.target.value);
  };

  return (
    <Container>
      <Header>
        <UserAvatar />
        <IconContainer>
          <IconButton>
            <ChatIcon />
          </IconButton>
          <IconButton>
            <MoreVertIcon />
          </IconButton>
        </IconContainer>
      </Header>
      <Search>
        <SearchIcon />
        <SearchInput placeholder="Search for chats" />
      </Search>
      <SidebarButton onClick={createChat}>START A NEW CHAT</SidebarButton>
      {newChat && (
        <form onSubmit={startNewChat}>
          <NewChatInput
            autoFocus
            placeholder="Search for user"
            onChange={getUserEmail}
          />
        </form>
      )}
    </Container>
  );
}

const Container = styled.div``;
const Header = styled.div`
  display: flex;
  position: sticky;
  top: 0;
  background-color: white;
  z-index: 1;
  justify-content: space-between;
  align-items: center;
  height: 80px;
  padding: 15px;
  border-bottom: 1px solid whitesmoke;
`;
const UserAvatar = styled(Avatar)`
  cursor: pointer;
  :hover {
    opacity: 0.8;
  }
`;
const IconContainer = styled.div``;

const Search = styled.div`
  display: flex;
  border-radius: 15%;
  padding: 15px;
  align-items: center;
`;
const SearchInput = styled.input`
  outline-width: 0;
  border: none;
  flex: 1;
  height: 30px;
`;

const SidebarButton = styled(Button)`
  width: 100%;
  color: black;
  padding: 10px;
  border-top: 1px solid whitesmoke;
  border-bottom: 1px solid whitesmoke;
`;

const NewChatInput = styled.input`
  width: 100%;
  padding: 10px;
  text-align: center;
  border-radius: 15%;
  outline-width: 0;
  border: none;
`;
export default Sidebar;
