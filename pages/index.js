import Head from 'next/head'
import Image from 'next/image'
import Sidebar from '../components/sidebar/Sidebar'
import styles from '../styles/Home.module.css'

export default function Home() {
  return (
    <div>
      <Head>
        <title>MessagingApp</title>
        <meta name="description" content="Generated by create next app" />
        <link rel="icon" href="/favicon.ico" />
      </Head>
      <Sidebar />
      <h1>First next JS app</h1>
    </div>
  )
}
